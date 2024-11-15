document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); 

        document.querySelectorAll('.sidebar-item a.nav-link').forEach(link => link.classList.remove('link-active'));

        this.classList.add('link-active');

        if (this.id === 'dashboard-link') {
            fetch('view-analytics.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                    loadChart()
                })
                
        }else if (this.id === 'student-link') {
            fetch('students/student-table.php')
                .then(response => response.text())
                .then(html => {
                    document.querySelector('.content-page').innerHTML = html;
                })
                
        }
    });
});

window.addEventListener('load', () => {
    document.querySelector('.sidebar-item a#dashboard-link').click();
});

function loadChart(){
    const paymentChartCanvas = document.getElementById('paymentChart');
    const paymentChart = new Chart(paymentChartCanvas, {
        type: 'pie',
        data: {
            labels: ['Full', 'Partial', 'Unpaid', 'Due'],
            datasets: [{
                label: 'Payment Status',
                data: [70, 20, 5, 5], 
                backgroundColor: [
                    '#093909',
                    '#84AE84',
                    '#A0A0A0',
                    '#EB1111'
                ],
                borderColor: [
                    '#093909',
                    '#84AE84',
                    '#A0A0A0',
                    '#EB1111'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}