
<?php 

$devi=$_POST['id'];

    $idDevice = 'pc';
    if ($devi == 2) {
        $idDevice = 'movil';
    }

echo '

            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/tunja_02.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/duitama_01.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/sogamoso_01.jpg" />
            </div>
             <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/villa_de_leyva_01.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/chinquira_01.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/paipa_01.jpg" />
            </div>
             <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/tunja_01.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/villa_de_leyva_02.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/sogamoso_02.jpg" />
            </div>
            <div data-p="150.00">
                <img data-u="image" src="img/'.$idDevice.'/chinquira_02.jpg" />
            </div>

  ';?>