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
                                    <th>{{ 'Masonry' | trans }}</th>
                                    <th>
                                        <input type="checkbox" v-model="widget.data.components.masonry" class="uk-checkbox">
                                    </th>
                                </tr>
                                <tr>
                                    <th>{{ 'Parallax' | trans }}</th>
                                    <th>
                                        <input type="number" v-model="widget.data.components.parallax" class="uk-input uk-form-small">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="uk-margin">
                        <h5 class="uk-heading-line uk-text-bold"><span>{{ 'Classes' | trans }}</span></h5>
                        <table class="uk-table">
                            <thead>
                                <tr>
                                    <td style="min-width:150px">{{ 'Name' | trans }}</td>
                                    <td class="uk-width-expand">{{ 'Value' | trans }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ 'Gap Modifiers' | trans }}</th>
                                    <th>
                                        <select class="uk-select uk-form-small" v-model="widget.data.classes.gap">
                                            <option value="">{{ 'Default' | trans }}</option>
                                            <option value="uk-grid-small">{{ 'Small' | trans }}</option>
                                            <option value="uk-grid-medium">{{ 'Medium' | trans }}</option>
                                            <option value="uk-grid-large">{{ 'Large' | trans }}</option>
                                            <option value="uk-grid-collapse">{{ 'Collapse' | trans }}</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th>{{ 'Divider Modifiers' | trans }}</th>
                                    <th>
                                        <input type="checkbox" class="uk-checkbox" v-model="widget.data.classes.divider">
                                    </th>
                                </tr>
                                <tr>
                                    <th>{{ 'Match Height' | trans }}</th>
                                    <th>
                                        <input type="checkbox" class="uk-checkbox" v-model="widget.data.classes.match">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="uk-margin">
                        <h5 class="uk-heading-line uk-text-bold"><span>{{ 'Width' | trans }}</span></h5>
                        <table class="uk-table">
                            <thead>
                                <tr>
                                    <td style="min-width:150px">{{ 'Device' | trans }}</td>
                                    <td class="uk-width-expand">{{ 'Value' | trans }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ 'Large Modifiers' | trans }}</th>
                                    <th>
                                        <select class="uk-select uk-form-small" v-model="widget.data.classes.device.large">
                                            <option value="uk-child-width-1-1@xl">{{ '1' | trans }}</option>
                                            <option value="uk-child-width-1-2@xl">{{ '2' | trans }}</option>
                                            <option value="uk-child-width-1-3@xl">{{ '3' | trans }}</option>
                                            <option value="uk-child-width-1-4@xl">{{ '4' | trans }}</option>
                                            <option value="uk-child-width-1-5@xl">{{ '5' | trans }}</option>
                                            <option value="uk-child-width-1-6@xl">{{ '6' | trans }}</option>
                                            <option value="uk-child-width-1-7@xl">{{ '7' | trans }}</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th>{{ 'Desktop Modifiers' | trans }}</th>
                                    <th>
                                        <select class="uk-select uk-form-small" v-model="widget.data.classes.device.desktop">
                                            <option value="uk-child-width-1-1@l">{{ '1' | trans }}</option>
                                            <option value="uk-child-width-1-2@l">{{ '2' | trans }}</option>
                                            <option value="uk-child-width-1-3@l">{{ '3' | trans }}</option>
                                            <option value="uk-child-width-1-4@l">{{ '4' | trans }}</option>
                                            <option value="uk-child-width-1-5@l">{{ '5' | trans }}</option>
                                            <option value="uk-child-width-1-6@l">{{ '6' | trans }}</option>
                                            <option value="uk-child-width-1-7@l">{{ '7' | trans }}</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th>{{ 'Tablet Modifiers' | trans }}</th>
                                    <th>
                                        <select class="uk-select uk-form-small" v-model="widget.data.classes.device.tablet">
                                            <option value="uk-child-width-1-1@m">{{ '1' | trans }}</option>
                                            <option value="uk-child-width-1-2@m">{{ '2' | trans }}</option>
                                            <option value="uk-child-width-1-3@m">{{ '3' | trans }}</option>
                                            <option value="uk-child-width-1-4@m">{{ '4' | trans }}</option>
                                            <option value="uk-child-width-1-5@m">{{ '5' | trans }}</option>
                                            <option value="uk-child-width-1-6@m">{{ '6' | trans }}</option>
                                            <option value="uk-child-width-1-7@m">{{ '7' | trans }}</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th>{{ 'Phone Modifiers' | trans }}</th>
                                    <th>
                                        <select class="uk-select uk-form-small" v-model="widget.data.classes.device.phone">
                                            <option value="uk-child-width-1-1@s">{{ '1' | trans }}</option>
                                            <option value="uk-child-width-1-2@s">{{ '2' | trans }}</option>
                                            <option value="uk-child-width-1-3@s">{{ '3' | trans }}</option>
                                            <option value="uk-child-width-1-4@s">{{ '4' | trans }}</option>
                                            <option value="uk-child-width-1-5@s">{{ '5' | trans }}</option>
                                            <option value="uk-child-width-1-6@s">{{ '6' | trans }}</option>
                                            <option value="uk-child-width-1-7@s">{{ '7' | trans }}</option>
                                        </select>
                                    </th>
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
    
    const grid = {
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
                        'masonry':false,
                        'parallax':0,
                    },
                    classes:{
                        'gap':'',
                        'divider': false,
                        'match': false,
                        'device':{
                            'large':'uk-child-width-1-4@xl',
                            'desktop':'uk-child-width-1-3@l',
                            'tablet':'uk-child-width-1-2@m',
                            'phone':'uk-child-width-1-1@s',
                        }
                    }
                } , this.widget.data)
            }
        },

        replace: false,

        components:{BlogWidget,CustomWidget}

    }

    import BlogWidget from '../types/blog.vue'
    import CustomWidget from '../types/custom-grid.vue'

    import componentSettings from '../lib/componentSettings'
    export default grid;
    window.Widgets.components['boxkit-grid.settings'] = grid
</script>
