document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); 

        document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => link.classList.remove('link-active'));

        this.classList.add('link-active');

        if (this.id === 'dashboard-link') {
            fetch('overview.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    loadChart()
                })
                
        }else if (this.id === 'university-link') {
            fetch('university/university.php')
            .then(response => response.text())
            .then(html => {
                document.querySelector('.content-page').innerHTML = html;
                
                document.getElementById('add-college').addEventListener('click', function(e) {
                    e.preventDefault();
                    addCollege();
                });

                document.getElementById('1').addEventListener('click', function(e) {
                    e.preventDefault();
                    fetch('university/organizations.php')
                    .then(response => response.text())
                    .then(html => {
                        document.querySelector('.content-page').innerHTML = html;

                        document.getElementById('org-overview-link').addEventListener('click', function(e) {
                            e.preventDefault();
                            fetch('university/org-overview.php')
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('.content-page').innerHTML = html;
                            })
                        });
                    })
                }); 
            })    
        } else {
            e.preventDefault(); 
        }

    });
});

window.addEventListener('load', () => {
    document.querySelector('.sidebar-item a#dashboard-link').click();
});

function addCollege() {
    fetch('university/add-college.html')
      .then(response => response.text())
      .then(html => {
    
        $('.modal-container').html(html);
        $('#modal-add-college').modal('show');
        $('#form-add-college').on('submit', function(e) {
          e.preventDefault();
        });
      });
  }

