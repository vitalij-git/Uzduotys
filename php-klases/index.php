<style>
.staciakampio-figura{
    background-color: green;
}
</style>

<?php
     echo '<form action="index.php" method="post">';
     echo '<button type="submit" name="trikampis">Trikampis</button>';
     echo '</form>';
     echo '<form action="index.php" method="post">';
     echo '<button type="submit" name="keturkampis">Keturkampis</button>';
     echo '</form>';

    class Klientas {
        public $vardas;
        public $pavarde;
        public $asmensKodas;
        public $prisijungimoData;
        public $adresas;
        public $elpastas;

        function __construct($vardas,$pavarde,$asmensKodas,$prisijungimoData,$adresas,$elpastas)
        { 
                $this->vardas=$vardas;
                $this->pavarde=$pavarde;
                $this->asmensKodas=$asmensKodas;
                $this->prisijungimoData=$prisijungimoData;
                $this->adresas=$adresas;
                $this->elpastas=$elpastas;
            
        }  
    }
    
    $klientai = array();
    for($i=0; $i<200;$i++){
        array_push($klientai, new Klientas("vardas".($i+1),"pavarde".($i+1),"asmensKodas".($i+1),"prisijungimoData".($i+1),"adresas".($i+1),"elpastas".($i+1)));
    }

    // echo "<table>";
    // foreach ($klientai as $eilute) {
    //     echo "<tr>";
    //     foreach ($eilute as $stulpelis) {
    //         echo "<td>";
    //         echo $stulpelis;
    //         echo "</td>";
    //     }
    //     echo "</tr>";
    // }
    // echo "</table>";

    
    class Trikampis{
        public $a;
        public $b;
        public $c;
        public $perimetras;
        public $pusPerimetris;
        public $plotas;
        public $kampasTarpBC;
        public $kampasTarpAC;
        public $kampasTarpAB;
        function __construct($a,$b,$c)
        {
            $this->a=$a;
            $this->b=$b;
            $this->c=$c;
            if($this->a+$this->b>$this->c && $this->a+$this->c>$this->b && $this->b+$this->c>$this->a){
                $this->perimetras();
                $this->pusPerimetris();
                $this->plotas();
                $this->kampai();
            }
            else{
                echo "tokio trikampio nera";
            }
        }
        function perimetras(){
            $this->perimetras = $this->a +$this->b +$this->c;
            return $this->perimetras;
        }
        function pusPerimetris(){
            $this->pusPerimetris= $this->perimetras/2;
            return $this->pusPerimetris;
        }
        function plotas(){
            $this->plotas = sqrt(($this->pusPerimetris *($this->pusPerimetris-$this->a)) *($this->pusPerimetris*($this->pusPerimetris-$this->b))*
            ($this->pusPerimetris *($this->pusPerimetris- $this->c)));
            return $this->plotas;
        }
        function kampai(){
            $pi =pi();
            $this->kampasTarpBC= (acos(((pow($this->b,2))+pow($this->c,2)-pow($this->a,2)) /(2*$this->b*$this->c)))*(180/$pi);
            $this->kampasTarpAC= (acos(((pow($this->a,2))+pow($this->c,2)-pow($this->b,2)) /(2*$this->a*$this->c)))*(180/$pi);
            $this->kampasTarpAB= (acos(((pow($this->a,2))+pow($this->b,2)-pow($this->c,2)) /(2*$this->a*$this->b)))*(180/$pi);
            return $this->kampasTarpBC; $this->kampasTarpAC; $this->kampasTarpAB;
        }
    }
    if(isset($_POST["trikampis"])){
        $trikampis= new Trikampis(3,4,5);
        echo"<p>";
        var_dump($trikampis);
        echo "</p>";
    }
  
    class Keturkampis{
        public $a;
        public $b;
        public $plotas;
        public $perimetras;
        public $istrizaine;
        
        function __construct($a,$b)
        {
            $this->a=$a;
            $this->b=$b;
            $this->plotas();
            $this->perimetras();
            $this->istrizaine();
            $this->nubraizyk();
        }
         function plotas(){
            $this->plotas=$this->a*$this->b;
            return $this->plotas;
        }
         function perimetras(){
            $this->perimetras= ($this->a *$this->a ) +($this->b*$this->b);
            return $this->perimetras;
        }
         function istrizaine(){
            $this->istrizaine=sqrt(pow($this->a,2)+pow($this->b,2)); 
            return $this->istrizaine;
        }
        function nubraizyk(){
            echo "<script> var staciakampioContainer = document.querySelector('.staciakampio-container');";
            echo "var div = document.createElement('div');";
            echo "div.style.width=".floatval($this->a)."px;";
            echo "div.style.height=".floatval($this->b)."px;";
            echo "div.classList.add('staciakampio-)figura');";
            echo "staciakampioContainer.append(div);";
            echo "</script>";
  
        }
    }
    if(isset($_POST["keturkampis"])){
        echo "<div class='staciakampio-container'> </div>";
        $keturkampis = new Keturkampis(4,5);
        echo"<p>";
        var_dump($keturkampis);
        echo "</p>";
      
    }
    
    
    ?>
    
