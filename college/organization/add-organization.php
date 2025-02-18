<?php
require_once '../../database/autoload_classes.php';
require_once '../../tools/functions.php';
    session_start();
?>

<!-- Modal -->
<div class="modal fade" id="modal-add-organization" tabindex="-1" aria-labelledby="modal-add-organizationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-organizationLabel"> Organization Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  id="form-add-organization" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row mb-3">

                            <input type="hidden" name="college_id" value="<?= htmlspecialchars($_SESSION['account']['college_id']); ?>">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="logo">Upload Logo</label>
                                    <div class="logo-container mt-2" id="upload">
                                        <input type="file" name="logo" id="logo-input" accept="image/*">
                                        <img id="logo-preview" src="#" alt="Logo Preview" style="display: none;" >
                                        <i class="fas fa-plus plus-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 mt-4">
                                <div class="col-md-9 mb-3">
                                    <div class="form-group">
                                        <label for="organizationName">Organization Name:</label>
                                        <input type="text" class="form-control" id="organizationName" name="organizationName" placeholder="Enter Organization Name">
                                    </div>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <div class="form-group">
                                        <label for="organizationCode">Organization Code:</label>
                                        <input type="text" class="form-control" id="organizationCode" name="organizationCode" placeholder="Organization Code" readonly>
                                        <small class="text-muted">Organization code is auto-generated and cannot be modified.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2 mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text " rows="4" maxlength="255" class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="buttons">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bgreen">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/UX.js"></script>
<script>
    var ignoreWords = ["of", "and", "the", "at", "in", "on", "to", "a", "an", "for", "by", "with", "from"];

    //Real=time validation college name format and generate college code
    document.getElementById("organizationName").addEventListener("input", function(event) {
        var organizationName = document.getElementById("organizationName");

        // split the college name into words
        var words = organizationName.value.split(' ');

        // Format each word
        var formattedWords = words.map(word => {
            word = word.trim(); // Remove any extra spaces
            if (word && !ignoreWords.includes(word.toLowerCase())) { // Ignore "of", "and", and "the"
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase(); // Capitalize the first letter and lowercase the rest
            } else {
                return word.toLowerCase(); // Keep the word as is
            }
        });
        organizationName.value = formattedWords.join(' ');

        var organizationCode = document.getElementById("organizationCode");

        var significantWords = words.filter(word => 
            !ignoreWords.includes(word.toLowerCase().trim())
        );

        // If exactly two significant words
        if (significantWords.length >= 3) {
            var organizationCodeValue = '';
            significantWords.forEach(word => {
                word = word.trim();
                if (word) {
                    organizationCodeValue += word.charAt(0).toUpperCase();
                }
            });
        } else {
            var firstWord = significantWords[0];
            var secondWord = significantWords[1];
            organizationCodeValue = firstWord.charAt(0) + secondWord.substring(0, 4);
        }

        //Return the College Code Value
        organizationCode.value = organizationCodeValue;
    });

    //Remove extra spaces in college name and generate college code again
    document.getElementById("organizationName").addEventListener("blur", function(event) {
        var organizationName = document.getElementById("organizationName");

        organizationName.value = removeExtraSpaces(organizationName.value);
        var words = organizationName.value.split(' ');

        var organizationCode = document.getElementById("organizationCode");

        var significantWords = words.filter(word => 
            !ignoreWords.includes(word.toLowerCase().trim())
        );

        // If exactly two significant words
        if (significantWords.length >= 3) {
            var organizationCodeValue = '';
            significantWords.forEach(word => {
                word = word.trim();
                if (word) {
                    organizationCodeValue += word.charAt(0).toUpperCase();
                }
            });
        } else {
            var firstWord = significantWords[0];
            var secondWord = significantWords[1];
            organizationCodeValue = firstWord.charAt(0) + secondWord.substring(0, 4);
        }

        //Return the College Code Value
        organizationCode.value = organizationCodeValue;
    });

    function removeExtraSpaces(string) {
        return string.trim().replace(/\s+/g, ' ');
    }
</script>