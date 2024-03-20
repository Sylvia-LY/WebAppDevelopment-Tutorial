<?php
    // q3
    abstract class Converter {
        abstract protected function convert($value);
    }

    // q4
    class C2FConverter extends Converter {
        public function convert($value) {
            return $value * 1.8 + 32;
        }
    }
    $c2f = new C2FConverter();
    $f = $c2f->convert(27);

    // q5
    class F2CConverter extends Converter {
        public function convert($value) {
            return ($value - 32) / 1.8;
        }
    }

    $f2c = new F2CConverter();
    $c = $f2c->convert(27);

    // q6
    class EUR2GBPConverter extends Converter {
        private $rate = 1;
        static private $fee = 0.5;

        function __construct($rate) {
            $this->rate = $rate;
        }

        public function fee() {
            return self::$fee;
        }

        public function rate() {
            return $this->rate;
        }

        public function convert($value) {
            return ($value * $this->rate) - self::$fee;
        }
    }

    $e2p = new EUR2GBPConverter(0.85);
    $p = $e2p->convert(999);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP introduction (3)</title>
</head>

<body>
    <p>27 &deg; C = <?php echo number_format($f, 2); ?> &deg; F</p>
    <p>27 &deg; F = <?php echo number_format($c, 2); ?> &deg; C</p>

    <p>999 EUR = <?php echo $p; ?> GBP</p>
    <p>(exchange rate = <?php echo $e2p->rate(); ?>,
        flat fee = <?php echo $e2p->fee(); ?> GBP) </p>
</body>

</html>