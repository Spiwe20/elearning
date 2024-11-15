<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
             <!-- Program Card -->
             <div class="card bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">Programs</h2>
                <p class="text-gray-700 mb-4">View and manage your Programs.</p>
                <a href="programs.php" class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
            </div>
            <!-- Assignment Card -->
            <div class="card bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">Assignments</h2>
                <p class="text-gray-700 mb-4">View and manage your assignments.</p>
                <a href="assignments.php" class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
            </div>
            <!-- Exercises Card -->
            <div class="card bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">Exercises</h2>
                <p class="text-gray-700 mb-4">View and manage your exercises.</p>
                <a href="exercises.php" class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
            </div>
            <!-- Quiz Card -->
            <div class="card bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-2">Quizzes</h2>
                <p class="text-gray-700 mb-4">View and manage your quizzes.</p>
                <a href="quizzes.php" class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
            </div>
        </div>
    </div>

    <script>
        // Add any required JavaScript for animations or responsiveness here
    </script>
</body>
</html>