<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become an Agent</title>
    <link rel="stylesheet" href="assets/css/become-agent.css"> <!-- Link to your CSS file -->
</head>

<body>
    <div class="split">
        <div class="introduction">
            <img src="images/other/home-service.jpg" alt="Real Estate Image">
            <div class="animated-text">
                <h2>Join Our Team</h2>
                <p>Your journey to becoming a successful real estate agent starts here.</p>
            </div>
        </div>
        <div class="form-container">
            <h1>Become an Agent</h1>
            <form action="code.php" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label>Upload profile picture</label>
                <input type="file" name="image" required>

                <label for="experience">Work Experience:</label>
                <select id="experience" name="experience" required>
                    <option value="">Select an option</option>
                    <option value="0-2">0-2 years</option>
                    <option value="2-5">2-5 years</option>
                    <option value="5-10">5-10 years</option>
                    <option value="10+">10+ years</option>
                </select>

                <label for="short_description">Short Description:</label>
                <textarea id="short_description" name="short_description" rows="4" placeholder="Add short info about you." required></textarea>

                <label for="long_description">Long Description:</label>
                <textarea id="long_description" name="long_description" rows="6" placeholder="Add your achievement and more info about you." required></textarea>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <div class="buttons">
                    <button type="submit" name="become_agent_btn">Submit Application</button>
                    <a href="agents.php">Back</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <!-- Include footer content if needed -->
    </footer>
</body>

</html>