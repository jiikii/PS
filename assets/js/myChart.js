const { createApp } = Vue;
createApp({
    data(){
        return{
            chart:[]
        }
    },
    methods:{
        getChartProduct:function(){
            const vm = this;
            const data = new FormData()
            data.append("method","getChartProduct")
            axios.post('../includes/chart-model.php',data)
            .then(function(r){
                var chartdata = [];
                r.data.forEach(function(v){
                    chartdata.push({
                        'day': v.day,
                        'count': v.count
                    })
                });
                var chart = document.getElementById('productChart');
                new Chart(chart,{
                    type:'bar',
                    data: {
                        labels: chartdata.map(row => row.day),
                        datasets: [
                        {
                            label: 'Per day',
                            data: chartdata.map(row => row.count)
                        }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                suggestedMin: 0,
                                suggestedMax: 10
                            },
                        }
                    }
                });
            })
            
        },
        
        getChartProductReceived:function(){
            const vm = this;
            const data = new FormData()
            data.append("method","getChartProductReceived")
            axios.post('../includes/chart-model.php',data)
            .then(function(r){
                var chartdata = [];
                r.data.forEach(function(v){
                    chartdata.push({
                        'day_add': v.day_add,
                        'count': v.count
                    })
                });
                var chart = document.getElementById('productReceivedChart');
                new Chart(chart,{
                    type:'bar',
                    data: {
                        labels: chartdata.map(row => row.day_add),
                        datasets: [
                        {
                            label: 'Per day',
                            data: chartdata.map(row => row.count)
                        }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                suggestedMin: 0,
                                suggestedMax: 10
                            },
                        }
                    }
                });
            })
            
        },
    
        
    },
    created:function(){
        this.getChartProduct();
        this.getChartProductReceived();
    },
    mounted:function(){
        const vm = this;
        
    }
}).mount('#mychart') 