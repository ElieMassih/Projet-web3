<style>
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    padding-top: 30px;
    padding-right: 15px;
    padding-left: 15px;
    padding-bottom: 15px;
    height: 100vh;
    position: fixed;
    overflow-y: auto;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 4px;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

.main-content {
    margin-left: 270px;
    padding: 20px;
    flex-grow: 1;
}

h1 {
    margin-top: 0;
}
</style>
<div class="sidebar" id="sidebar">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="./user.php">Users</a></li>
        <li><a href="./hotels.php">Hotels</a></li>
        <li><a href="./attractions.php">Attractions</a></li>
        <li><a href="./guides.php">Guides</a></li>
        <li><a href="./cars.php">Cars</a></li>
        <li><a href="./flights.php">Flights</a></li>
    </ul>
</div>
