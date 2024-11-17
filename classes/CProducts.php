<?php
require_once '../config.php';

class CProducts
{
	private $connection;

	public function __construct()
	{
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		$table_name = "Products";
		$query = "SHOW TABLES LIKE '$table_name'";
		$result = $this->connection->query($query);

		if ($result->num_rows == 0) {
			$this->createTable();
			$this->fillTable();
		}
	}

	public function getProducts($max_amount = 10)
	{
		$statement = $this->connection->prepare("SELECT * FROM Products ORDER BY DATE_CREATE DESC LIMIT ?");
		$statement->bind_param("i", $max_amount);
		$statement->execute();
		$result = $statement->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function updateQuantity($id, $quantity)
	{
		$statement = $this->connection->prepare("UPDATE Products SET PRODUCT_QUANTITY = ? WHERE ID = ?");
		$statement->bind_param("ii", $quantity, $id);

		return $statement->execute();
	}

	public function hideProduct($id)
	{
		$statement = $this->connection->prepare("UPDATE Products SET IS_HIDDEN = 1 WHERE ID = ?");
		$statement->bind_param("i", $id);

		return $statement->execute();
	}

	private function createTable()
	{
		$sql = file_get_contents('../sql/create_products_table.sql');
		$statement = $this->connection->prepare($sql);

		return $statement->execute();
	}

	private function fillTable()
	{
		$sql = file_get_contents('../sql/fill_table.sql');
		$statement = $this->connection->prepare($sql);

		return $statement->execute();
	}
}
?>