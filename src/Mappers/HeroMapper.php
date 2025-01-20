<?php

final class HeroMapper {
    public static function mapToObject(array $data): Hero 
    {
        return new Hero(
            $data['id'],
            $data['name'],
            $data['image'],
        );
    }
}