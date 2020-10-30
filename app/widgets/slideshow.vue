<template>
    <div class="pk-grid-large pk-width-sidebar-large" uk-grid>
        <div class="pk-width-content">
            <div class="uk-margin">
                <label for="form-title" class="uk-form-label">{{ 'Title' | trans }}</label>
                <v-input id="form-title" type="text" name="title" placeholder="Enter Title" view="class: uk-width-expand uk-form-large uk-input" rules="required" v-model="widget.title" message="Title cannot be blank."/>
            </div>

            <div class="uk-grid-divider" uk-grid>
                <div class="uk-width-expand@m"> 
                    <div class="uk-margin">
                        <div class="uk-margin">
                            <component :is="widget.data.widget_type" :config.sync="config" :widget.sync="widget"></component>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large@m">
                    <div class="uk-margin">
                        <h5 class="uk-heading-line uk-text-bold"><span>{{ 'Components' | trans }}</span></h5>
                        <table class="uk-table">
                            <thead>
                                <tr>
                                    <td style="min-width:150px">{{ 'Name' | trans }}</td>
                                    <td class="uk-width-expand">{{ 'Value' | trans }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ 'Animation' | trans }}</th>
                                    <th>
                                        <select class="uk-select uk-form-small" v-model="widget.data.components.animation">
                                            <option value="slide">{{ 'Slide' | trans }}</option>
                                            <option value="fade">{{ 'Fade' | trans }}</option>
                                            <option value="scale">{{ 'Scale' | trans }}</option>
                                            <option value="pull">{{ 'Pull' | trans }}</option>
                                            <option value="push">{{ 'Push' | trans }}</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th>{{ 'Autoplay' | trans }}</th>
                                    <th><input type="checkbox" class="uk-checkbox" v-model="widget.data.components.autoplay"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Autoplay Interval' | trans }}</th>
                                    <th><input type="text" class="uk-input uk-form-small" v-model.number="widget.data.components['autoplay-interval']"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Draggable' | trans }}</th>
                                    <th><input type="checkbox" class="uk-checkbox" v-model="widget.data.components.draggable"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Easing' | trans }}</th>
                                    <th><input type="text" class="uk-input uk-form-small" v-model="widget.data.components['easing']"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Infinite' | trans }}</th>
                                    <th><input type="checkbox" class="uk-checkbox" v-model="widget.data.components.infinite"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Pause On Hover' | trans }}</th>
                                    <th><input type="checkbox" class="uk-checkbox" v-model="widget.data.components['pause-on-hover']"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Index' | trans }}</th>
                                    <th><input type="number" class="uk-input uk-form-small" v-model.number="widget.data.components.index"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Velocity' | trans }}</th>
                                    <th><input type="number" class="uk-input uk-form-small" v-model.number="widget.data.components.velocity"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Ratio' | trans }}</th>
                                    <th><input type="text" class="uk-input uk-form-small" v-model="widget.data.components['ratio']"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Min Height' | trans }}</th>
                                    <th><input type="text" class="uk-input uk-form-small" v-model.number="widget.data.components['min-height']"></th>
                                </tr>
                                <tr>
                                    <th>{{ 'Max Height' | trans }}</th>
                                    <th><input type="text" class="uk-input uk-form-small" v-model.number="widget.data.components['max-height']"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="pk-width-sidebar">

            <div class="uk-margin">
                <label class="uk-form-label">{{ 'Type' | trans }}</label>
                <select class="uk-select uk-width-expand" v-model="widget.data.widget_type">
                    <option v-for="(type , id) in types" :key="id" :value="type.name">{{ type.label }}</option>
                </select>
            </div>

            <component :is="'template-settings'" :widget.sync="widget" :config.sync="config" :form="form" />

            <div class="uk-margin">
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-margin-small">
                        <label><input type="checkbox" class="uk-checkbox" v-model="widget.data.markdown" number><span class="uk-margin-small-left">{{ 'Markdown' | trans }}</span></label>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    
    const slideShow = {
        section: {
            label: 'Settings'
        },

        props: ['widget', 'config', 'form'],

        inject: ['$components'],

        mixins: [componentSettings],

        created() {
            _.extend(this.$options.components, this.$components);

            if(!this.widget.data.components){
                this.widget.data = _.merge({
                    components:{
                        'animation':'slide',
                        'autoplay':true,
                        'autoplay-interval':7000,
                        'draggable':true,
                        'easing':'ease',
                        'finite':false,
                        'pause-on-hover':true,
                        'index':0,
                        'velocity':1,
                        'ratio':'16:9',
                        'min-height':'',
                        'max-height':''
                    }
                } , this.widget.data)
            }
        },

        replace: false,

        components:{BlogWidget,CustomWidget}

    }

    import BlogWidget from '../types/blog.vue'
    import CustomWidget from '../types/custom.vue'

    import componentSettings from '../lib/componentSettings'
    export default slideShow;
    window.Widgets.components['boxkit-slideshow.settings'] = slideShow
</script>
