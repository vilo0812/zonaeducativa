<template>
	<div class="ticket" @click="viewTicket">
        <div class="header">
            
        </div>
        <div class="main">
            <img class="centerImg" src="images/icons/zeg.png" alt="">
            <h3 class="centerCode">{{direction}}</h3>
        </div>
        <div class="footer">
            <div class="items">
                <img src="images/icons/GobiernoBolivarianoVenezolano.png" alt="logo ministerio" class="logo-img">
                <img src="images/icons/mppe.png" alt="logo gobernación" class="logo-img">
                <img src="images/icons/zeg.png" alt="logo zona educativa guarico" class="logo-img">
            </div>
    	</div>
    </div>
</template>

<script>
export default {
	methods: {
	  viewTicket () {
	    console.log('hola que hace');
	  }
	},
  name: 'Ticket',
  props:['direction','code','id'],
  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
		.ticket{
        border: 1px black solid;
        min-width: 350px;
        margin-top: 15px;
        margin-left: 5px;
        }
		.ticket:hover{
			background: rgba(0.1,0.1,0.1,0.1);
		}
        .header{
        border-bottom: 1px black solid;
        height: 50px;
        background: red;
        width: 100%;
        }
        .main{
        width: 250px;
        margin: auto;
        }
        .centerImg{
        width: 100%;
        }
        .centerCode{
        text-align: center;
        color:black;
        }
        .items{
        width: 60%;
        margin:auto;
        }
        .logo-img {
        width: 40px;
        margin:0px 10px;
        }
</style>