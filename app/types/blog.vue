<template>
    <div class="uk-form-controls">
        <div class="uk-margin">
            <label class="uk-form-label">{{ 'Limit' | trans }}</label>
            <div class="uk-form-controns">
                <select class="uk-select" v-model.number="widget.data.type_options.limit">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="uk-form-controls uk-form-controls-text">
            <p class="uk-margin">
                <label><input type="checkbox" class="uk-checkbox" v-model="widget.data.type_options.showExcerpt" number><span class="uk-margin-small-left">{{ 'Show Excerpt' | trans }}</span></label>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['widget', 'config', 'form'],

    types:{
        label: 'Blog',
        priority: 10,
        render: 'boxkit:views/slideshow/blog.php'
    },

    created(){
        if(this.widget.data.widget_type === 'BlogWidget' && !this.widget.data.type_options){
            this.widget.data.type_options = {
                limit: 5,
                showExcerpt: true,
            }
            this.widget.data.items = [];
        }
    }
}
</script>