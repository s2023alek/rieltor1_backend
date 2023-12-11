<?php

namespace App\Models;

use CodeIgniter\Model;

class Apartment extends Model
{

    protected $table = 't_apartment';
    protected $primaryKey = "pk_i_id";
    protected $returnType     = 'array';
    protected $allowedFields = [
        /*
         * тип объекта:
         * 1 - Квартиры
         * 2 - Дома
         * 21 - Коттеджные посёлки
         * 22 - Коттеджи
         * 23 - Таунхаусы
         * 3 - Новостройки
         * 4 - Участки
         * 5 - Торговые площади
         * 6 - Офисы
         * 7 - Пром. базы
         * 8 - Инвестпроекты
         * 9 - Гостиницы
         * 10 - Рестораны
         * 500 - Аренда Квартиры
         * 501 - Аренда Дома
         * 502 - Аренда Торговые площади
         * 503 - Аренда Офисы
         * 504 - Аренда Гостиницы
         */
        'i_object_type'
        /*
         * Квартиры
         */
        , 's_title'//название
        , 'i_num_of_rooms'//Кол-во комнат null - по запросу(не указано)
        , 'i_area'//Общая площадь
        , 'i_price'//Цена
        , 'i_price_sqm'//Цена за м²
        , 'i_level'//Этаж
        , 'i_levels'// всего этажей
        , 'i_status_id'//Статус (в карточке) - Жилое помещение
        , 'i_status2_id'//Статус2 (в меню) - Пентхаусы
        , 'i_microdistrict_id'//Микрорайон
        , 's_street'//Улица
        , 'i_sea_distance'//До моря метров
        , 'i_view_from_window_id'//Вид из окон
        , 'i_renovation_type_id'//Ремонт
        , 'i_bathroom_type_id'//Санузел
        , 'i_class_id'//класс(меню) - Бизнес-класс
        , 's_legal_information_ids'//юридическая информация(карточка) ид вариантов покупки
        , 'b_is_studio'//это студия
        , 's_latitude'//широта
        , 's_longitude'//долгота
        , 's_description'//описание
        /*
         * Дома
         */
        , 'dt_mod_date'//дата обновления объявления
        , 'b_active'//активно

    ];
}
