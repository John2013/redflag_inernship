<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 25.07.2018
 * Time: 17:46
 *
 * @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model
 * @var bool $res
 */
echo add_form($model);
if($res){
	echo alert('Запись сохранена', 'success');
}