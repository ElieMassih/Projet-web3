<style>

.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    padding: 15px;
    height: 100vh;
    position: fixed;
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
        <li><a href="#dashboard">Dashboard</a></li>
        <li><a href="#users">Users</a></li>
        <li><a href="#settings">Settings</a></li>
        <li><a href="#reports">Reports</a></li>
        <li><a href="#logout">Logout</a></li>
    </ul>
</div>
