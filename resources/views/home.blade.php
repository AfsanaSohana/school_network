<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects and Readings Tab</title>
  <style>
    /* Include your styles here */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
    }
    .container {
      width: 90%;
      max-width: 1100px;
      margin: auto;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
      margin-top: 40px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: #007bff;
      color: white;
      border-bottom: 2px solid #0056b3;
    }
    .header .title {
      font-size: 24px;
      font-weight: bold;
    }
    .header .user {
      font-size: 18px;
    }
    .tabs {
      display: flex;
      background-color: #f4f4f4;
      border-bottom: 2px solid #ddd;
    }
    .tabs button {
      flex: 1;
      padding: 15px;
      border: none;
      background-color: #f4f4f4;
      cursor: pointer;
      text-align: center;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }
    .tabs button:hover {
      background-color: #ddd;
    }
    .tabs button.active {
      background-color: #007bff;
      color: white;
    }
    .content {
      padding: 30px;
      display: none;
      animation: fadeIn 0.5s ease-out;
    }
    .content.active {
      display: block;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    table th, table td {
      padding: 12px;
      text-align: left;
      border: 1px solid #ddd;
    }
    table th {
      background-color: #007bff;
      color: white;
    }
    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    table tr:hover {
      background-color: #f1f1f1;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      font-weight: bold;
      display: block;
      margin-bottom: 8px;
    }
    .form-group input, 
    .form-group select, 
    .form-group button {
      width: 100%;
      padding: 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    .form-group button {
      background-color: #28a745;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .form-group button:hover {
      background-color: #218838;
    }
    .submit-btn {
      text-align: right;
    }
    .submit-btn button {
      background-color: #007bff;
      color: white;
    }
    .submit-btn button:hover {
      background-color: #0056b3;
    }
    .radio-group label {
      display: inline-block;
      margin-right: 20px;
    }
    .form-group input[type="file"] {
      padding: 0;
    }
    .tabs button.active {
      background-color: #28a745;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header Section -->
    <div class="header">
      <div class="title">Projects and Readings Tab</div>
      <div class="user">User: <strong>{{ $username }}</strong></div>
    </div>

    <!-- Tabs -->
    <div class="tabs">
      <button class="tab-button active" data-tab="personal-info">Personal Info</button>
      <button class="tab-button" data-tab="projects">Projects</button>
      <button class="tab-button" data-tab="readings">Readings</button>
    </div>

    <!-- Content Sections -->
    <div id="personal-info" class="content active">
      @include('partials.student') <!-- Use Blade includes for reusable sections -->
    </div>

    <div id="projects" class="content">
      @include('partials.project')
    </div>

    <div id="readings" class="content">
      @include('partials.reading')
    </div>
  </div>

  <script>
    // JavaScript for Tab Navigation
    const tabButtons = document.querySelectorAll('.tab-button');
    const contentSections = document.querySelectorAll('.content');

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        tabButtons.forEach(btn => btn.classList.remove('active'));
        contentSections.forEach(content => content.classList.remove('active'));

        button.classList.add('active');
        const tabId = button.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
      });
    });
  </script>
</body>
</html>
