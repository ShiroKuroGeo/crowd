<?php
require('../../Database.php');
class dashboard
{

    public function getAllUser($id)
    {
        return $this->getAllColumnUsers($id);
    }

    public function deleteApproval($id)
    {
        return $this->deleteApprovalFunction($id);
    }

    public function getDonationOfUser($id)
    {
        return $this->getDonationOfUsers($id);
    }

    public function getNeedApprovalOfUser($id)
    {
        return $this->getNeedApprovalOfUserFunction($id);
    }

    public function getCampaignOfUser($id)
    {
        return $this->getCampaignOfUserColumn($id);
    }

    public function getViewAllIDonated($id)
    {
        return $this->viewAllIDonated($id);
    }

    public function allImages($id)
    {
        return $this->allImagesFunction($id);
    }

    public function updateCampaign($due)
    {
        return $this->updateCampaignMethod($due);
    }

    public function dogetCampaignUsingId($id)
    {
        return $this->getCampaignUsingId($id);
    }

    public function getUserCampaign()
    {
        return $this->getUserCampaignMethod();
    }

    public function doGetPassApproval($useid, $donateId, $amount, $picture)
    {
        return $this->getPassApproval($useid, $donateId, $amount, $picture);
    }

    public function doDonate($useid, $donateId, $amount, $picture)
    {
        return $this->getDonate($useid, $donateId, $amount, $picture);
    }

    public function getContactUs($name, $email, $address, $message)
    {
        return $this->contactUs($name, $email, $address, $message);
    }

    public function UpdateProfile($user_id, $name, $email, $address)
    {
        return $this->getUpdateProfile($user_id, $name, $email, $address);
    }

    public function getComment($campaignId)
    {
        return $this->allComments($campaignId);
    }

    public function storeComment($user_id, $comment, $donationId)
    {
        return $this->getStoreComment($user_id, $comment, $donationId);
    }

    public function getStoreCampaign($userId, $title, $cat, $goal, $locat, $due, $descrip, $gcash, $validId, $Image)
    {
        return $this->storeCampaign($userId, $title, $cat, $goal, $locat, $due, $descrip, $gcash, $validId, $Image);
    }

    public function doUpdateUserCampaign($campaign_title, $categories, $campaign_goal, $location, $campaign_deadline, $campaign_description, $proofUrl, $campaign_id)
    {
        return $this->updateUserCampaignFunciton($campaign_title, $categories, $campaign_goal, $location, $campaign_deadline, $campaign_description, $proofUrl, $campaign_id);
    }

    private function getAllColumnUsers($id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableColumnUsersQuery());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getDonationOfUsers($id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableColumnDonationOfUserQuery());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getNeedApprovalOfUserFunction($id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getNeedApprovalOfUserQuery());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getUserCampaignMethod()
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getUserCampaignQuery());
                $query->execute();
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function allComments($campaignId)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableColumnCommentQuery());
                $query->execute(array($campaignId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getCampaignOfUserColumn($userId)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableOfCampaignUserQuery());
                $query->execute(array($userId));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function updateCampaignMethod($due)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableColumnUpdateCampaignQuery());
                $query->execute(array($due));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function deleteApprovalFunction($id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->deleteApprovalQuery());
                $query->execute(array($id));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function storeCampaign($userId, $title, $cat, $goal, $locat, $due, $descrip, $gcash, $validId, $Image)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableColumnStoreCampaignQuery());
                $query->execute(array($userId, $title, $cat, $goal, $locat, $due, $descrip, $gcash, $validId, $Image, $userId));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getStoreComment($user_id, $comment, $donationId)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableColumnStoreCommentQuery());
                $query->execute(array($user_id, $comment, $donationId));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function allImagesFunction($id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->allImagesQuery());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getPassApproval($useid, $donateId, $amount, $picture)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getPassApprovalQuery());
                $query->execute(array($useid, $donateId, $amount, $picture));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getDonate($useid, $donateId, $amount, $picture)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getTableColumnDonationQuery());
                $query->execute(array($useid, $donateId, $amount, $picture));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function contactUs($name, $email, $address, $message)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->contactUsQuery());
                $query->execute(array($name, $email, $address, $message));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getUpdateProfile($user_id, $name, $email, $address)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getUpdateProfileQuery());
                $query->execute(array($name, $email, $address, $user_id));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getCampaignUsingId($id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->getCampaignUsingIdQuery());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function viewAllIDonated($id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->viewAllIDonatedQuery());
                $query->execute(array($id));
                $result = $query->fetchAll();
                $con->closeConnection();
                return json_encode($result);
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function updateUserCampaignFunciton($campaign_title, $categories, $campaign_goal, $location, $campaign_deadline, $campaign_description, $proofUrl, $campaign_id)
    {
        try {
            $con = new Database();
            if ($con->getStatus()) {
                $query = $con->getCon()->prepare($this->updateUserCampaign());
                $query->execute(array($campaign_title, $categories, $campaign_goal, $location, $campaign_deadline, $campaign_description, $proofUrl, $campaign_id));
                $result = $query->fetch();
                $con->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NotConnectedToDatabase";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function getTableColumnUsersQuery()
    {
        return "SELECT u.user_id, u.name, u.email, u.country, u.image, SUM(d.amount) as totalAmount FROM users u INNER JOIN donations d ON d.fk_user_id = u.user_id WHERE u.user_id = ?";
    }

    private function getUserCampaignQuery()
    {
        return "SELECT c.fk_user_id, u.name AS name, u.image as profilePicture, c.campaign_id, c.campaign_title, c.categories, c.campaign_goal, c.location, c.campaign_deadline, c.date_created, c.campaign_description, c.gcashPicture, c.validId, c.image, c.status, SUM(d.amount) AS rendered_goal FROM users u INNER JOIN campaigns c ON c.fk_user_id = u.user_id LEFT JOIN donations d ON d.fk_campaign_id = c.campaign_id GROUP BY u.name, c.campaign_id, c.campaign_title, c.categories, c.campaign_goal, c.location, c.campaign_deadline, c.campaign_description, c.gcashPicture, c.validId, c.image, c.status;";
    }

    private function getTableColumnDonationQuery()
    {
        return "INSERT INTO proofdonation (`user_id`, `camp_id`, `amount`, `receipt`) VALUES (?,?,?,?)";
    }

    private function getPassApprovalQuery()
    {
        return "INSERT INTO donations (`fk_user_id`, `fk_campaign_id`, `amount`, `receipt`) VALUES (?,?,?,?)";
    }

    private function getUpdateProfileQuery()
    {
        return "UPDATE users SET name = ?, email = ?, country = ? WHERE user_id = ?";
    }

    private function contactUsQuery()
    {
        return "INSERT INTO `contact_us` (`name`, `email`, `address`, `message`) VALUES (?,?,?,?)";
    }

    private function getTableColumnCommentQuery()
    {
        return "SELECT c.comment, u.name FROM `comments` c INNER JOIN `users` u ON c.fk_user_id = u.user_id WHERE c.fk_campaign_id = ? ORDER BY c.date_created DESC";
    }

    private function getTableColumnStoreCommentQuery()
    {
        return "INSERT INTO `comments`(`fk_user_id`, `comment` , `fk_campaign_id`) VALUES (?,?,?)";
    }

    private function getTableOfCampaignUserQuery()
    {
        return "SELECT `campaign_goal`, `campaign_title`, `image`, `location`, `categories`, `campaign_id`, `status` FROM campaigns WHERE fk_user_id = ?";
    }

    private function getTableColumnStoreCampaignQuery()
    {
        return "INSERT INTO `campaigns`(`fk_user_id`, `campaign_title`, `categories`, `campaign_goal`, `location`, `campaign_deadline`, `campaign_description`, `gcashPicture`, `validId`, `image`) VALUES (?,?,?,?,?,?,?,?,?,?);
                    
                    SET @campaignId = LAST_INSERT_ID();

                    INSERT INTO donations(fk_user_id, fk_campaign_id) VALUES (?, @campaignId);
            ";
    }

    private function getTableColumnUpdateCampaignQuery()
    {
        return "UPDATE `campaigns` SET `status`= 3 WHERE `campaign_deadline` = ?";
    }

    private function getTableColumnDonationOfUserQuery()
    {
        return "SELECT d.date_created, d.amount as amount, d.receipt, c.campaign_title, u.name, c.proofUrl, d.fk_campaign_id FROM donations d INNER JOIN campaigns c INNER JOIN users u on d.fk_user_id = u.user_id AND d.fk_campaign_id = c.campaign_id WHERE c.fk_user_id = ?";
    }

    private function getNeedApprovalOfUserQuery()
    {
        return "SELECT d.created_at, d.amount as amount, d.receipt, c.campaign_title, u.name, d.camp_id FROM proofdonation d INNER JOIN campaigns c INNER JOIN users u on d.user_id = u.user_id AND d.camp_id = c.campaign_id WHERE c.fk_user_id = ?";
    }

    private function viewAllIDonatedQuery()
    {
        return "SELECT d.date_created, d.amount as amount, d.receipt, c.campaign_title, u.name, c.proofUrl, d.fk_campaign_id FROM donations d INNER JOIN campaigns c INNER JOIN users u on d.fk_user_id = u.user_id AND d.fk_campaign_id = c.campaign_id WHERE d.fk_user_id = ?";
    }

    private function updateUserCampaign()
    {
        return "UPDATE `campaigns` SET campaign_title  = ? , categories = ? , campaign_goal = ? , location = ? , campaign_deadline = ? , campaign_description = ? , proofUrl = ?  WHERE campaign_id = ?";
    }

    private function getCampaignUsingIdQuery()
    {
        return "SELECT * FROM `campaigns` WHERE campaign_id = ?";
    }

    private function allImagesQuery()
    {
        return "SELECT `campaign_id`, `image`  FROM `campaigns` WHERE campaign_id  = ?";
    }

    private function deleteApprovalQuery()
    {
        return "DELETE FROM `proofdonation` WHERE `camp_id` = ?";
    }
}
