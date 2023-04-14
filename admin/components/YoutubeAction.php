<?php
namespace app\admin\components;

use yii\rest;
use Yii;
use Google;
use app\admin\models\Files;

class YoutubeAction extends rest\Action
{
    public function run() {
        $data = Yii::$app->request->post();

        $path = Yii::getAlias('@file' . $data['file']);
        $client = new Google\Client();
        $auth_file = Yii::getAlias('@file' . '/client_secret.json');

        $client->setAuthConfig($auth_file);

        $client->addScope(Google\Service\YouTube::YOUTUBE_FORCE_SSL);
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setApprovalPrompt('consent');
        $client->setIncludeGrantedScopes(true);
        $client->setLoginHint('voronin.trest@gmail.com');

        $youtube = new Google\Service\YouTube($client);

        try {
            if (!empty($_SESSION['token'])) {
                $client->setAccessToken($_SESSION['token']);
            } else {
                return 'Нет токена авторизации. Необходимо авторизоваться в своем Google-аккаунте';
            }

            if ($client->getAccessToken()) {
                try {
                    $mime_type = mime_content_type($path);
                    $snippet = new Google\Service\YouTube\VideoSnippet();
                    $snippet->setTitle($data['name']);
                    $snippet->setDescription($data['description']);
                    $snippet->setTags($data['tags']);
                    $snippet->setCategoryId(22);

                    $status = new Google\Service\YouTube\VideoStatus();
                    $status->setPrivacyStatus('private');
                    $status->setEmbeddable(true);
                    $status->setMadeForKids(false);

                    $video = new Google\Service\YouTube\Video();
                    $video->setSnippet($snippet);
                    $video->setStatus($status);

                    $response = $youtube->videos->insert('snippet, status', $video, [
                        'data' => file_get_contents($path),
                        'mimeType' => $mime_type
                    ]);

                    if (!empty($response['id'])) {
                        $playlistItem = new Google\Service\YouTube\PlaylistItem();

                        $playlistItemSnippet = new Google\Service\YouTube\PlaylistItemSnippet();
                        $playlistItemSnippet->setPlaylistId('PL5S2Qqp-6IsndEEODIGO1ShR4GfJsws0W');
                        $playlistItemSnippet->setPosition(0);
                        $resourceId = new Google\Service\YouTube\ResourceId();
                        $resourceId->setKind('youtube#video');
                        $resourceId->setVideoId($response['id']);
                        $playlistItemSnippet->setResourceId($resourceId);
                        $playlistItem->setSnippet($playlistItemSnippet);

                        $youtube->playlistItems->insert('snippet', $playlistItem);

                        $video_file = Files::findOne($data['id']);

                        if ($video_file) {
                            Files::updateAll(['youtube_load' => 1], ['id' => $data['id']]);
                        }

                        return 'Видео успешно загружено!';
                    } else {
                        return $response;
                    }
                } catch (\Exception $ex) {
                    return 'Произошла ошибка при загрузке видео: ' . $ex;
                }
            } else {
                return 'Нет токена авторизации. Необходимо авторизоваться в своем Google-аккаунте';
            }
        } catch (\Exception $e) {
            return 'Произошла ошибка при загрузке видео: ' . $e;
        }
    }
}