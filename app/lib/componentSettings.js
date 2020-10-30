export default {
    data(){
        return {
            types:[],
        }
    },

    watch:{
        'widget.data.widget_type':{
            handler(name){
                this.setRender(name)
            },
            deep:true
        }
    },

    created(){
        if(!this.widget.data.widget_type){
            this.widget.data = _.merge({
                widget_type: 'CustomWidget',
                items:[],
                markdown: false,
                type_options: false,
                render: {}
            } , this.widget.data)
        }

        const types = [];
        _.forIn(this.$options.components, (component, name) => {
            if (component.types) {
                types.push(_.extend({ name, priority: 0 }, component.types));
            }
        });
        this.$set(this, 'types', _.sortBy(types, 'priority'));
        this.setRender(this.widget.data.widget_type)
    },

    methods:{
        setRender(name){
            _.forIn(this.types , (component) => {
                if(component.name === name){
                    this.widget.data.render = component
                }
            })
        }
    }
}