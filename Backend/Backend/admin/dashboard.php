<?php
    require('../../Database.php');
    class dashboard{

        public function updateUserStatus($user_id, $status){
            return $this->getUpdateUserStatus($user_id, $status);
        }
        public function selected($id) {
            return $this->getAllColumnUsers2($id);
        }

        public function getAllUser() {
            return $this->getAllColumnUsers();
        }

        public function getAllDonations() {
            return $this->getTableColumnDonation();
        }

        public function getAllCampaigns() {
            return $this->getTableColumnCampaigns();
        }

        public function getContact() {
            return $this->getTableGetContact();
        }

        public function getAllColumnTable() {
            return $this->AllColumnTable();
        }

        public function deleteId($id) {
            return $this->getDeleteId($id);
        }

        public function updateCampaign($id, $status){
            return $this->getUpdateCampaign($id, $status);
        }

        public function getDonationWithUserAndCampaigns(){
            return $this->donationWithUserAndCampaigns();
        }

        private function getAllColumnUsers(){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->getTableColumnUsersQuery());
                    $query->execute();
                    $result = $query->fetchAll();
                    $con->closeConnection();
                    return json_encode($result);

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        

        private function getAllColumnUsers2($id){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->getTableColumnUsersQuery2());
                    $query->execute(array($id));
                    $result = $query->fetchAll();
                    $con->closeConnection();
                    return json_encode($result);

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function getTableColumnDonation(){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->getTableColumnDonationQuery());
                    $query->execute();
                    $result = $query->fetchAll();
                    $con->closeConnection();
                    return json_encode($result);

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function getTableColumnCampaigns(){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->getTableColumnCampaignsQuery());
                    $query->execute();
                    $result = $query->fetchAll();
                    $con->closeConnection();
                    return json_encode($result);

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function donationWithUserAndCampaigns(){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->donationWithUserAndCampaignsQuery());
                    $query->execute();
                    $result = $query->fetchAll();
                    $con->closeConnection();
                    return json_encode($result);

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function AllColumnTable(){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->TableAllQuery());
                    $query->execute();
                    $result = $query->fetchAll();
                    $con->closeConnection();
                    return json_encode($result);

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function getTableGetContact(){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->getTableGetContactQuery());
                    $query->execute();
                    $result = $query->fetchAll();
                    $con->closeConnection();
                    return json_encode($result);

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function getDeleteId($id){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->deleteUserQuery());
                    $query->execute(array($id));
                    $result = $query->fetch();
                    $con->closeConnection();

                    if(!$result){
                        return 200;
                    }else{
                        return 400;
                    }

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function getUpdateCampaign($id, $status){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->updateCampaignIdQuery());
                    $query->execute(array($status, $id));
                    $result = $query->fetch();
                    $con->closeConnection();

                    if(!$result){
                        return 200;
                    }else{
                        return 400;
                    }

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }
        private function getUpdateUserStatus($user_id, $status){
            try {
                $con = new Database();
                if($con->getStatus()){
                    $query = $con->getCon()->prepare($this->updateUserQuery());
                    $query->execute(array($status, $user_id));
                    $result = $query->fetch();
                    $con->closeConnection();

                    if(!$result){
                        return 200;
                    }else{
                        return 400;
                    }

                }else{
                    return "NotConnectedToDatabase";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function getTableColumnUsersQuery(){
            return "SELECT * FROM users";
        }

        private function getTableColumnDonationQuery(){
            return "SELECT * FROM donations";
        }

        private function getTableGetContactQuery(){
            return "SELECT * FROM contact_us";
        }

        private function getTableColumnCampaignsQuery(){
            return "SELECT c.fk_user_id, u.name AS name, c.campaign_id, c.campaign_title, c.categories, c.campaign_goal, c.location, c.campaign_deadline, c.campaign_description, c.gcashPicture, c.validId, c.image, c.status, SUM(d.amount) AS rendered_goal FROM users u INNER JOIN campaigns c ON c.fk_user_id = u.user_id LEFT JOIN donations d ON d.fk_campaign_id = c.campaign_id GROUP BY u.name, c.campaign_id, c.campaign_title, c.categories, c.campaign_goal, c.location, c.campaign_deadline, c.campaign_description, c.gcashPicture, c.validId, c.image, c.status;";
        }
        
        private function deleteUserQuery(){
            return "DELETE FROM users WHERE user_id = ?";
        }
        
        private function updateCampaignIdQuery(){
            return "UPDATE campaigns set `status` = ? WHERE campaign_id = ?";
        }
        
        private function updateUserQuery(){
            return "UPDATE users set `is_logged` = ? WHERE `user_id` = ?";
        }
        
        private function donationWithUserAndCampaignsQuery(){
            return "SELECT d.date_created, d.amount as amount, d.receipt, c.campaign_title, u.name FROM donations d INNER JOIN campaigns c INNER JOIN users u on d.fk_user_id = u.user_id AND d.fk_campaign_id = c.campaign_id";
        }
        
        private function getTableColumnUsersQuery2(){
            return "SELECT u.user_id, u.name, u.email, u.country, u.image, SUM(d.amount) as totalAmount FROM users u INNER JOIN donations d ON d.fk_user_id = u.user_id WHERE u.user_id = ?";
        }
        
        private function TableAllQuery(){
            return "SELECT COUNT(user_id) as total FROM users

            UNION ALL
            
            SELECT COUNT(campaign_id) as total FROM campaigns
            
            UNION ALL 
            
            SELECT COUNT(donation_id) as total FROM donations as totalAll;";
        }

    }
?>