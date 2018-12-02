<?php
    class Model
    {
        protected static $table ='table';

        protected static $timestamp = true;

        public static function all()
        {
            $sql = implode(' ',[
               'SELECT * FROM ',
               quote_sql(static::$table)
            ]);

            $dbh = db()->prepare($sql);
            $dbh->execute();

            return $dbh->fetchAll();
        }

        public static function create($params)
        {
            if(static::$timestamp){
                $now =date('Y-m-d H:i:s');

                foreach(['created_at','updated_at'] as $timestamps_key){
                    $params[$timestamps_key] = array_get($params,$timestamps_key,$now);
                }
            }

            $cols =array_keys($params);
            $values =array_values($params);
var_dump($values);
            $sql = implode(' ',[
                'INSERT INTO',
                quote_sql(static::$table),
                '('.implode(', ', array_map('quote_sql', $cols)).')',
                'VALUES',
                '(' .implode(', ',array_pad([],count($values),'?')).')',
            ]);
                $dbh =db()->prepare($sql);

//            echo  $dbh;
            $dbh->execute($values);
//var_dump($dbh);
//exit;
                if(!$dbh->execute($values)){
                echo 'aaa';
                exit;
                    return false;
                }
                return db()->lastInsertId('id');
        }

        public static function delete($id)
        {
            $sql =implode(' ',[
                'DELETE FROM',
                quote_sql(static::$table),
                'WHERE `id` = ?',
                ]);

            $values =[$id];

            $dbh =db()->prepare($sql);
            return $dbh->execute($values);
        }
    }