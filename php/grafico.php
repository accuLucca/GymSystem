        <?php

        $pdo = new PDO('mysql:host=localhost;dbname=academia;port=3307;chartset=utf8', 'Ricardo', '1234@puc');

        $sql = "SELECT hora FROM Agenda";

        $statement = $pdo->prepare($sql);

        $statement->execute();

        while ($results = $statement->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $results;
        }

        echo json_encode($result);

        ?>