<footer class="footer">
    <div class="container">
        <div class="footer__top" itemscope itemtype="http://schema.org/Organization">
            <meta itemprop="name" content="Кредитный потребительский кооператив «ТРЕСТ»">
            <div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <img src="/img/logo-dark.svg" alt="logo-dark" itemprop="logo">
                    </div>
                    <div class="text-right">
                        <div class="fb-6 mb-2" itemprop="telephone">
                            <a href="tel:88006005009" class="black phone-link">
                                8 800 600-50-09
                            </a>
                        </div>
                        <div class="fb-5 mb-2" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <span itemprop="addressLocality">Москва</span>, <span itemprop="streetAddress">Красная Пресня 29</span>
                        </div>
                    </div>
                </div>
                <div class="fb-6 footer-social d-flex flex-wrap justify-content-start justify-content-md-between align-items-center">
                    <a class="footer-social-link zchbLink mb-4 mb-lg-0" target="_blank" href="https://zachestnyibiznes.ru/company/report?ogrn=1186820002170&type=rating">
                        <div class="footer-social-icon mt-1 mb-1">
                            <?= file_get_contents(Yii::getAlias('@file/img/zb.svg')) ?>
                        </div>
                    </a>

                    <div class="d-flex footer-social-bottom flex-wrap align-items-center">
                        <div class="d-flex flex-wrap align-items-center">
                            <a class="footer-social-link m-1" href="https://t.me/trest24777" target="_blank">
                                <div class="footer-social-icon telegram"></div>
                            </a>
                            <a class="footer-social-link m-1" href="https://vk.com/public212646335" target="_blank">
                                <div class="footer-social-icon vk"></div>
                            </a>
                        </div>
                        <iframe class="m-1" src="https://yandex.ru/sprav/widget/rating-badge/224620672326?type=rating" width="150" height="50" frameborder="0"></iframe>
                        <a class="footer-social-link m-1" href="https://2gis.ru/moscow/firm/70000001034793311" target="_blank">
                            <div class="footer-social-icon gis"></div>
                        </a>
                    </div>
                </div>
            </div
        </div>
        <div class="footer__files">
        <?php
            $doc = \app\models\Settings::field('doc','footer',[]);

            foreach ($doc as $key => $item):
                if ($item['url']):
        ?>
            <a href="<?= $item['url']?>" class="link-gray" target="_blank">
                <?= $item['name']?>
            </a>
            <span class="delimiter-purple"></span>
        <?php
            endif;
            endforeach;
        ?>
        </div>
        <div class="footer__bottom">
            <?= \app\models\Settings::field('doc','footer-text','') ?>
        </div>
        <div class="footer__c">
            ©2023 trest24.ru
        </div>
    </div>
</footer>

