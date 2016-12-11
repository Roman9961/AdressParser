<?php


class Address extends Model
{
    public $addresses;

    public function getList(){
        $file = fopen($this->csv, 'r');
        $i=0;
        while (($line = fgetcsv($file))) {
            $this->addresses[] = [
                "id" => $i++,
                "name" => $line[0],
                "phone" => $line[1],
                "street" => $line[2]
            ];
        }

        fclose($file);
        return $this->addresses;
    }

    public  function getById($id){
        $id=(int)$id;
        $file = fopen($this->csv, 'r');
        $i=0;
        while (($line = fgetcsv($file))) {
            if($i==$id) {
                $this->addresses = [
                    "id" => $i,
                    "name" => $line[0],
                    "phone" => $line[1],
                    "street" => $line[2]
                ];
            }
            $i++;
        }

        fclose($file);
        return $this->addresses;
    }

    public  function  delete($id){
        $id=(int)$id;

        $file=file($this->csv);

        $fp=fopen($this->csv,'w');

        for($i=0;$i<sizeof($file);$i++)

        {

            if($i==$id)

            {

                unset($file[$i]);

            }

        }

        fputs($fp,implode("",$file));

        fclose($fp);

    }

    public  function  save($data, $id=null){
       if (empty($data['name']) || empty($data['phone']) || empty($data['street']) ) {
           return false;
        }
        $id=(int)$id;
        $name=$data['name'];
        $phone=$data['phone'];
        $street=$data['street'];
        $content = $name.",".$phone.",".$street.PHP_EOL;

        if (!$id){ //Add new record
            $fp=fopen($this->csv,'a');
            fputs($fp,$content);

            fclose($fp);

        }else{ //Update existing record
            $file=file($this->csv);

            $fp=fopen($this->csv,'w');

            for($i=0;$i<sizeof($file);$i++)

            {

                if($i==$id)

                {

                    $file[$i]=$content;

                }

            }

            fputs($fp,implode("",$file));

            fclose($fp);

        }
        }

}