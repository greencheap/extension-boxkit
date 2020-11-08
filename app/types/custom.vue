<template>
    <div>
        <button class="uk-button uk-button-primary" @click.prevent="addItems">{{ 'Add' | trans }}</button>
        <div class="uk-margin" v-if="widget.data.items.length">
            <draggable v-model="widget.data.items" handle=".item-draggable">
                <div class="uk-margin" v-for="(item , id) in widget.data.items" :key="id">
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-header">
                            <div class="uk-child-width-1-2" uk-grid>
                                <div class="uk-text-truncate">
                                    {{ item.title ? item.title : `Item ${id}` }}
                                </div>
                                <div class="uk-flex uk-flex-right">
                                    <ul class="uk-iconnav">
                                        <a class="item-draggable" uk-icon="icon: move"></a>
                                        <li v-show="item.show"><a @click.prevent="changeShow(id)" uk-icon="icon: chevron-down"></a></li>
                                        <li v-show="!item.show"><a @click.prevent="changeShow(id)" uk-icon="icon: chevron-left"></a></li>
                                        <li><a @click.prevent="deleteItem(id)" uk-icon="icon: trash"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div v-show="item.show" class="uk-card-body uk-card-small">
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Title' | trans }}</label>
                                <div class="uk-form-controls">
                                    <input type="text" class="uk-input" v-model="item.title">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Content' | trans }} <span v-show="widget.data.markdown" class="uk-text-small uk-text-success">{{ 'Markdown Active' | trans }}</span></label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea uk-height-small" v-model="item.content"></textarea>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'URL' | trans }}</label>
                                <div class="uk-form-controls">
                                    <input-link v-model="item.link" input-class="uk-form-width-large"></input-link>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Button Text' | trans }}</label>
                                <div class="uk-form-controls">
                                    <input type="text" class="uk-input" v-model="item.link_text" :placeholder=" 'Link' | trans " :disabled="!item.link.length">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Align Content' | trans }}</label>
                                <div class="uk-form-label">
                                    <div class="uk-form-controls">
                                        <select class="uk-select" v-model="item.align">
                                            <option value="left">{{ 'Left' | trans }}</option>
                                            <option value="center">{{ 'Center' | trans }}</option>
                                            <option value="right">{{ 'Right' | trans }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">{{ 'Media Type' | trans }}</label>
                                <div class="uk-form-controls">
                                    <select class="uk-select" v-model="item.media_type">
                                        <option value="image">{{ 'Image' | trans }}</option>
                                        <option value="video">{{ 'Video' | trans }}</option>
                                    </select>
                                </div>
                            </div>

                            <div v-if="item.media_type === 'image'" class="uk-margin">
                                <label class="uk-form-label">{{ 'Image' | trans }}</label>
                                <div class="uk-form-controls">
                                    <input-image v-model="item.media" input-class="uk-form-width-large" />
                                </div>
                            </div>

                            <div v-if="item.media_type === 'video'" class="uk-margin">
                                <label class="uk-form-label">{{ 'Video (Youtube or Vimeo)' | trans }}</label>
                                <div class="uk-form-controls">
                                    <input type="link" class="uk-input" v-model="item.media.url">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </draggable>
        </div>
        <div class="uk-margin-large-top uk-text-center" v-else>
            <h4>{{ 'Not Found Items' | trans }}</h4>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'

export default {
    props: ['widget', 'config', 'form'],

    types:{
        label: 'Custom',
        priority: 0,
        render: 'boxkit:views/slideshow/custom.php'
    },

    methods: {
        addItems(){
            this.widget.data.items.push({
                'title':'',
                'content':'',
                'media_type':'image',
                'media':'',
                'link':'',
                'link_text':'',
                'align':'left',
                'show':true,
            })
        },

        deleteItem(id){
            this.widget.data.items.splice(id , 1);
        },

        changeShow(id){
            const item = this.widget.data.items[id];
            item.show = item.show ? false:true;
            this.widget.data.items['id'] = item;
        }
    },

    components: {
        draggable
    }
}
</script>