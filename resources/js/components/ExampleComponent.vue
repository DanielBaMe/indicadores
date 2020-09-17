
<template>
  <div class="small">
    <h4>Denuncias</h4>
    <line-chart :chart-data="datacollection" :height="100"></line-chart>
  </div>
</template>

<script>

import LineChart from './LineChart.js'

export default {
  components: {
    LineChart
  },
  data(){
    return {
      datacollection: null
    }
  },
  mounted () {
    this.fillData(denuncias)
  },
  methods: {

    fillData (chartData)
    {
      this.datacollection = {
        labels: ['Denuncias','Querellas'],
        datasets: [
          {
            label: 'Ventas',
            backgroundColor: '#FF0066',
            data: chartData
          },
        ]
      }
    }
  }
}
</script>

<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin:  50px auto;
}
</style>