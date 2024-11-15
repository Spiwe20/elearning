<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .alert {
            transition: opacity 0.5s;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Assignments</h1>

        <!-- Alert Messages -->
        <div id="alert" class="alert hidden bg-green-500 text-white p-4 rounded mb-4">
            <span id="alert-message"></span>
        </div>

        <!-- Program Selection -->
        <div class="mb-4">
            <label for="program-select" class="block text-gray-700">Select Program</label>
            <select id="program-select" class="w-full p-2 border border-gray-300 rounded">
                <!-- Options will be populated by JavaScript -->
            </select>
        </div>

        <!-- Assignments List -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-4">
            <h2 class="text-xl font-bold mb-2">Assignments</h2>
            <div id="assignments-list" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Dynamic content will be inserted here -->
            </div>
        </div>

        <!-- Upload Assignment Form -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-4">
            <h2 class="text-xl font-bold mb-2">Upload Assignment</h2>
            <form id="upload-assignment-form" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="assignment-file" class="block text-gray-700">Assignment File</label>
                    <input type="file" id="assignment-file" name="assignment-file" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const programSelect = document.getElementById('program-select');
            const assignmentsList = document.getElementById('assignments-list');
            const uploadForm = document.getElementById('upload-assignment-form');
            const alertBox = document.getElementById('alert');
            const alertMessage = document.getElementById('alert-message');

            // Fetch programs from the database and populate the select input
            fetch('./server/get_programs.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(program => {
                        const option = document.createElement('option');
                        option.value = program.id;
                        option.textContent = `${program.program_name} (${program.assignment_count} assignments)`;
                        programSelect.appendChild(option);
                    });
                });

            // Fetch assignments when a program is selected
            programSelect.addEventListener('change', function() {
                const programId = programSelect.value;
                fetch(`./server/get_assignments.php?program_id=${programId}`)
                    .then(response => response.json())
                    .then(data => {
                        renderAssignments(data);
                    });
            });

            // Render assignments
            function renderAssignments(assignments) {
                assignmentsList.innerHTML = '';
                assignments.forEach(assignment => {
                    const card = document.createElement('div');
                    card.className = 'bg-white p-4 rounded-lg shadow-lg';
                    card.innerHTML = `
                        <h3 class="text-lg font-bold mb-2">${assignment.title}</h3>
                        <p class="text-gray-700 mb-4">${assignment.description}</p>
                        <a href="${assignment.file_path}" target="_blank" class="bg-blue-500 text-white px-4 py-2 rounded">View File</a>
                    `;
                    assignmentsList.appendChild(card);
                });
            }

            // Handle assignment upload
            uploadForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(uploadForm);
                formData.append('program_id', programSelect.value);

                fetch('./server/upload_assignment.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    showAlert(data);
                    programSelect.dispatchEvent(new Event('change'));
                })
                .catch(error => console.error('Error:', error));
            });

            function showAlert(message) {
                alertMessage.textContent = message;
                alertBox.classList.remove('hidden');
                setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 3000);
            }
        });
    </script>
</body>
</html>