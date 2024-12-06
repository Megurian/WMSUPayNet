<?php
        require_once '../student/includes/head.php';
    ?>

<body>
    <div class="body">

    <?php 
       require_once '../student/includes/topnav.php';
       ?>

    <div class="report-form-container">
        <h2>Report a Problem</h2>
        <form>
            <div class="checkbox-group">
                <label><input type="checkbox"> Payment Issues</label>
                <label><input type="checkbox"> Access Control Problems</label>
                <label><input type="checkbox"> System Performance</label>
                <label><input type="checkbox"> Fee Structure Errors</label>
                <label><input type="checkbox"> Profile Issues</label>
                <label><input type="checkbox"> User Interface Issues</label>
                <label><input type="checkbox"> Student Data Errors</label>
                <label><input type="checkbox"> Other organization-specific permissions</label>
            </div>
            <div class="textarea-group">
                <label for="description">Kindly describe the issue below:</label>
                <textarea id="description" rows="5"></textarea>
            </div>
            <div class="attachment-group">
                <label for="attachment">Attachments:</label>
                <div class="attachment-input">
                    <input type="file" id="attachment">
                    <i class="fas fa-paperclip"></i>
                </div>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>
