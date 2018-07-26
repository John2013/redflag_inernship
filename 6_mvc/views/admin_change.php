<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 26.07.2018
 * Time: 11:30
 *
 * @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model
 * @var bool|null $res
 */
echo change_form($model);
if($res){
	echo alert('Запись изменена', 'success');
} elseif($res === false){
	echo alert('Ошибка изменения', 'warning');
}
