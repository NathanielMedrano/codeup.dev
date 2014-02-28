<?php

class Filestore {

    public $filename = '';

    function __construct($filename = 'address_book.csv') 
    {
        $this->filename = $filename;
    }

    /**
     * Returns array of lines in $this->filename
     */
   function read_file() {
        $contents = [];
        $handle = fopen($this->filename, "r");
        while (($data = fgetcsv($handle)) !== FALSE) {
            $contents[] = $data;
        }
        fclose($handle);
        return $contents;
    }

    /**
     * Writes each element in $array to a new line in $this->filename
     */
    function save_file($address_book){
            $handle = fopen($this->filename, 'w');
            foreach ($address_book as $row) {
                fputcsv($handle, $row);
                }
            fclose($handle);
        }


}