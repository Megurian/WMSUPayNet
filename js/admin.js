$(document).ready(function(){
    $('.nav-link').on('click', function(e){
        e.preventDefault()
        $('.nav-link').removeClass('link-active')
        $(this).addClass('link-active')
        
        let url = $(this).attr('href')
        window.history.pushState({path: url}, '', url)
    })

    $('#dashboard-link').on('click', function(e){
        e.preventDefault()
        viewAnalytics()
    })

    $('#student-link').on('click', function(e){
        e.preventDefault()
        viewStudents()
    })

    let url = window.location.href;
    if (url.endsWith('dashboard')){
        $('#dashboard-link').trigger('click')
    }else if (url.endsWith('student')){
        $('#student-link').trigger('click')
    }else{
        $('#dashboard-link').trigger('click')
    }

     function viewAnalytics(){
         $.ajax({
             type: 'GET',
             url: 'view-analytics.php',
             dataType: 'html',
             success: function(response){
                 $('.content-page').html(response)
                 loadChart()
             }
         })
     }

     function viewStudents(){
        $.ajax({
            type: 'GET',
            url: 'students/student-table.php',
            dataType: 'html',
            success: function(response){
                $('.content-page').html(response)
               
            }
        })
    }

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

   
});