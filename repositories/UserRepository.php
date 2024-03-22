<?php
    
    require_once __DIR__ . "/../classes/Database.php";
    require_once __DIR__ . "/../classes/User.php";

    class UserRepository extends Database
    {
        public function getAll()
        {
            $data = $this->getDb()->query('SELECT * FROM todo_user' );

            $users = [];

            foreach ($data as $user) {
                $newUser = new User(
                    $user['userID'],
                    $user['prenom'],
                    $user['email'],
                    $user['password'],
                );

                $users[] = $newUser;
            }

            return $users;
        }

        public function getUser()
        {
            $data = $this->getDb()->query('SELECT * FROM todo_user WHERE userID = userID');
            $users = [];
            foreach ($data as $user) {
                $newUser = new User(
                    $user['userID'],
                    $user['prenom'],
                     $user['email'],
                    $user['password'],
                );
                
                $users[] = $newUser;
            }
            
            var_dump($users);
            return $users;
        }

        public function findById($userID)
        {
            $_SESSION['user'] = $userID;
            $request = 'SELECT * FROM todo_user WHERE userID = :userID';
        
            $query = $this->getDb()->prepare($request);
        
            $query->execute([':userID' => $userID]);
        
            $data = $query->fetch();
        
            if ($data) {
                $searchedUser = new User(
                    $data['userID'],
                    $data['prenom'],
                     $data['email'],
                    $data['password']
                );
        
                // Assigning $userID to $_SESSION['user']
        
                return $searchedUser;
            }
        }
        
        public function findByEmail($email)
        {
            try {
                $request = 'SELECT * FROM todo_user WHERE email = :email';
                $query = $this->getDb()->prepare($request);

                $query->execute(['email' => $email]);

                $user = $query->fetch(PDO::FETCH_ASSOC);

                return $user ? $user : false;
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
        }


        public function create($newUser)
        {
            try {
                $existingUser = $this->findByEmail($newUser->getEmail());

                if ($existingUser) {
                    throw new Exception("Email address already exists!");
                }

                $request = 'INSERT INTO todo_user (userID, prenom, email, password)
                    VALUES (:userID, :prenom, :email, :password)';
                $query = $this->getDb()->prepare($request);

                $query->execute([
                    'userID' => $newUser->getUserID(),
                    'prenom' => $newUser->getPrenom(),
                    'email' => $newUser->getEmail(),
                    'password' => $newUser->getPassword(),
                ]);

                return $this->getDb()->lastInsertId();
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }



        public function update($user)
        {
            $request = 'UPDATE todo_user SET prenom = :prenom, email = :email, password = :password  WHERE userID = :userID';

            $query = $this->getDb()->prepare($request);

            $query->execute([
                'userID'=>$user->getUserID(),
                'name' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),

            ]);
        }

        public function delete($userID)
{
    // Assuming $_SESSION['user'] holds the userID
    $request = 'DELETE FROM todo_user WHERE userID = :userID';

    $query = $this->getDB()->prepare($request);

    $query->execute([
        'userID' => $_SESSION['user'] 
    ]);
}

    }