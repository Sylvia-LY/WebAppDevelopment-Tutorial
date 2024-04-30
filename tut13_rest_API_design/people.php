<?php
    class PeopleAPI {
        private $pdo;
        private $status;
        private $data = array();

        function __construct()
        {
            try {
                $this->pdo = new PDO($dsn, $user, $password);
            }
            catch (PDOException $e) {
                $this->status = 500;
            }
        }

        function __destruct() {
            $this->pdo = null;
        }

        public function handleRequest() {

            if (!($this->status === 500)) {
                // determine HTTP method
                switch ($_SERVER['REQUEST_METHOD']) {
                    case 'GET':
                        $this->read();
                        break;
                    case 'POST':
                        $this->write();
                        break;
                    case 'PUT':
                        $this->update();
                        break;
                    case 'DELETE':
                        $this->delete();
                        break;
                    default:
                        $this->status = 405;
                }

            }

            http_response_code($this->status);

            if ($this->status === 200 || $this->status === 201) {
                header('Content-Type: application/json');
                echo json_encode($this->data);
            }
        }


        private function read() {

            // presence check
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // check if it is an integer, if it is positive...
                if (!ctype_digit($id)) {
                    $this->status = 400;
                    return ;
                }
                else {
                    // build and execute an SQL statement
                    $sql = 'select * from people where id=:id';
                    $sth = $this->pdo->prepare($sql);
                    $sth->bindParam('id', $id, PDO::PARAM_STR);
                }
            }
            else {
                $sql = 'select * from people';
                $sth = $this->pdo->prepare($sql);
            }

            $sth->execute();
            
            if ($sth->rowCount() > 0) {
                $result = $sth->fetchAll(pdo::FETCH_ASSOC);
                foreach ($result as $row) {
                    array_push($this->data, $row);
                }
                $this->status = 200;
            }
            else {
                $this->status = 204;

            }

        }
        
        private function write() {

            if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];

                if (ctype_alnum($firstname) && ctype_alnum($lastname)) {
                    $sql = 'insert into `people` (`firstname`, `lastname`, `phone`) values (?, ?, ?)';
                    $sth = $this->pdo->prepare($sql);
                    $sth->execute(array($firstname, $lastname, $phone));

                    $this->data = array('id' => $this->pdo->lastInsertId());
                    $this->status = 201;
                }
                else {
                    $this->status = 400;
                }
            }
            else {
                $this->status = 400;
            }

        }
        
        private function update() {
            parse_str(file_get_contents('php://input'), $_PUT);

            if (isset($_PUT['id']) && isset($_PUT['firstname']) && isset($_PUT['lastname']) && isset($_PUT['phone'])) {
                $id = $_PUT['id'];
                $firstname = $_PUT['firstname'];
                $lastname = $_PUT['lastname'];
                $phone = $_PUT['phone'];

                if (ctype_digit($id) && ctype_alnum($firstname) && ctype_alnum($lastname)) {
                    $sql = 'update people set firstname = ?, lastname = ?, phone = ? where id = ?';
                    $sth = $this->pdo->prepare($sql);
                    $sth->execute(array($firstname, $lastname, $phone, $id));

                    if ($sth->rowCount() > 0) {
                        $this->data = array('id' => $id);
                        $this->status = 200;
                    }
                    else {
                        $this->status = 204;
                    }
                }
                else {
                    $this->status = 400;
                }
            }

            else {
                $this->status = 400;
            }

        }
        
        private function delete() {
            parse_str(file_get_contents('php://input'), $_DELETE);

            if (isset($_DELETE['id'])) {
                $id = $_DELETE['id'];

                if (ctype_digit($id)) {
                    $sql = 'delete from people where id = ?';
                    $sth = $this->pdo->prepare($sql);
                    $sth->execute([$id]);

                    if ($sth->rowCount() > 0) {
                        $this->data = array('id' => $id);
                        $this->status = 200;
                    }
                    else {
                        $this->status = 204;
                    }
                }
                else {
                    $this->status = 400;
                }
            }
            else {
                $this->status = 400;
            }
        }
    }

    
    $api = new PeopleAPI();
    $api->handleRequest();

?>