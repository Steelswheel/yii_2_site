<?php
namespace app\widgets;

class TableTariff extends \yii\bootstrap\Widget
{
    public $table;

    public function run()
    {
        $border = isset($this->table['WRAPPER']['border']) ? $this->table['WRAPPER']['border'] : '';

        $r = "<div class='table-wrapper table-border-$border'><table class='table table-border table-sm'>";

        if (!empty($this->table['HEAD'])) {
            $r .= '<thead>';

            foreach ($this->table['HEAD'] as $row) {
                $r .= '<tr>';

                foreach ($row as $i) {
                    $colspan = isset($i['colspan']) ? $i['colspan'] : 1;

                    $r .= "<th colspan='$colspan' class='thead-background-$i[background] thead-color-$i[color] table-border-$i[border]'>" . $i['content'] . '</th>';
                }

                $r .= '</tr>';
            }

            $r .= '</thead>';
        }

        if (!empty($this->table['BODY'])) {
            $r .= '<tbody>';

            foreach ($this->table['BODY'] as $row) {
                $r .= '<tr>';

                foreach ($row as $i) {
                    $colspan = isset($i['colspan']) ? $i['colspan'] : 1;

                    $r .= "<td colspan='$colspan' class='table-border-$i[border]'>" . $i['content'] . '</td>';
                }

                $r .= '</tr>';
            }

            $r .= '</tbody>';
        }

        $r .= '</table></div>';

        return $r;
    }
}
