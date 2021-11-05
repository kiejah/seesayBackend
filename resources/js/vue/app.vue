<template>
    <div class="todoListContainer">
        <div class="heading">
           <h2 id="title"></h2>
           <add-item-form v-on:reloadList="getList()"/>
        </div>
        <div class="body-list">
            <list-view :items="items" 
            v-on:reloadList="getList()"/>
        </div>

    </div>
</template>
<script>
import addItemForm from "./addItemForm"
import listView from "./listView"

export default { 
        components:{
            addItemForm,
            listView
        },
        data:function(){
            return {
                items:[]
            }

        },
        methods:{
            getList(){
                axios.get('/api/items')
                .then(response=>{
                     this.items= response.data
                })
                .catch(error=> console.log(error))

            }
        },
        created(){
            this.getList()
        }
    }
</script>
<style scoped>
.todoListContainer{
    width:350px;
    margin: auto;
}
.heading{
    background:#e6e6e6;
    padding: 10px;
    margin-bottom: 10px;
    border-bottom: .5px solid #000;
}
.title{
    text-align: center;
}

</style>