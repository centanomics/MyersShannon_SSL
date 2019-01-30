<? 
class fruits extends CI_Model {


    public function getDetail($id) {
        $query = $this->db->query('SELECT * from fruit_table where id=?', array($id));
        return $query->result();
    }

}
?>