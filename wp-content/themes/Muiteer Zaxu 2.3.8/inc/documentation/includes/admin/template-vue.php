<div class="wrap" id="muiteerdocs-app">
    <h1><?php _e('Documentations', 'muiteer'); ?> <a class="page-title-action" href="#" v-on:click.prevent="addDoc"><?php _e('Add Documentation', 'muiteer'); ?></a></h1>
    <!-- <pre>{{ $data | json }}</pre> -->
    <span class="spinner is-active" style="float: none;"></span>
    <ul class="docs not-loaded" v-sortable>
        <li class="single-doc" v-for="(doc, index) in docs" :data-id="doc.post.id">
            <h3>
                <a v-if="doc.post.caps.edit" target="_blank" :href="editurl + doc.post.id">{{ doc.post.title }}<span v-if="doc.post.status != 'publish'" class="doc-status"><?php esc_attr_e('Pending', 'muiteer'); ?></span></a>
                <span v-else>{{ doc.post.title }}<span v-if="doc.post.status != 'publish'" class="doc-status"><?php esc_attr_e('Pending', 'muiteer'); ?></span></span>
                <span class="muiteerdocs-row-actions">
                    <a target="_blank" :href="viewurl + doc.post.id" title="<?php esc_attr_e('Preview the documentation', 'muiteer'); ?>"><span class="dashicons dashicons-visibility"></span></a>
                    <span v-if="doc.post.caps.delete" class="muiteerdocs-btn-remove" v-on:click="removeDoc(index, docs)" title="<?php esc_attr_e('Delete this documentation', 'muiteer'); ?>"><span class="dashicons dashicons-trash"></span></span>
                    <span class="muiteerdocs-btn-reorder" title="<?php esc_attr_e('Re-order the documentation', 'muiteer'); ?>"><span class="dashicons dashicons-menu"></span></span>
                </span>
            </h3>
            <div class="inside">
                <ul class="sections" v-sortable>
                    <li v-for="(section, index) in doc.child" :data-id="section.post.id">
                        <span class="section-title" v-on:click="toggleCollapse">
                            <a v-if="section.post.caps.edit" target="_blank" :href="editurl + section.post.id">{{ section.post.title }}<span v-if="section.post.status != 'publish'" class="doc-status"><?php esc_attr_e('Pending', 'muiteer'); ?></span> <span v-if="section.child.length > 0" class="count">{{ section.child.length }}</span></a>
                            <span v-else>{{ section.post.title }}<span v-if="section.post.status != 'publish'" class="doc-status"><?php esc_attr_e('Pending', 'muiteer'); ?></span> <span v-if="section.child.length > 0" class="count">{{ section.child.length }}</span></span>
                            <span class="actions muiteerdocs-row-actions">
                                <span class="muiteerdocs-btn-reorder" title="<?php esc_attr_e('Re-order this section', 'muiteer'); ?>"><span class="dashicons dashicons-menu"></span></span>
                                <a target="_blank" :href="viewurl + section.post.id" title="<?php esc_attr_e('Preview the section', 'muiteer'); ?>"><span class="dashicons dashicons-visibility"></span></a>
                                <span class="muiteerdocs-btn-remove" v-if="section.post.caps.delete" v-on:click="removeSection(index, doc.child)" title="<?php esc_attr_e('Delete this section', 'muiteer'); ?>"><span class="dashicons dashicons-trash"></span></span>
                                <span class="add-article" v-on:click="addArticle(section,$event)" title="<?php esc_attr_e('Add a new article', 'muiteer'); ?>"><span class="dashicons dashicons-plus-alt"></span></span>
                            </span>
                        </span>
                        <ul class="articles collapsed connectedSortable" v-if="section.child" v-sortable>
                            <li class="article" v-for="(article, index) in section.child" :data-id="article.post.id">
                                <span>
                                    <a v-if="article.post.caps.edit" target="_blank" :href="editurl + article.post.id">{{ article.post.title }}<span v-if="article.post.status != 'publish'" class="doc-status"><?php esc_attr_e('Pending', 'muiteer'); ?></span></a>
                                    <span v-else>{{ article.post.title }}</span>
                                    <span class="actions muiteerdocs-row-actions">
                                        <span class="muiteerdocs-btn-reorder" title="<?php esc_attr_e('Re-order this article', 'muiteer'); ?>"><span class="dashicons dashicons-menu"></span></span>
                                        <a target="_blank" :href="viewurl + article.post.id" title="<?php esc_attr_e('Preview the article', 'muiteer'); ?>"><span class="dashicons dashicons-visibility"></span></a>
                                        <span class="muiteerdocs-btn-remove" v-if="article.post.caps.delete" v-on:click="removeArticle(index, section.child)" title="<?php esc_attr_e('Delete this article', 'muiteer'); ?>"><span class="dashicons dashicons-trash"></span></span>
                                    </span>
                                </span>
                                <ul class="articles" v-if="article.child.length">
                                    <li v-for="(art, index) in article.child">
                                        <a v-if="art.post.caps.edit" target="_blank" :href="editurl + art.post.id">{{ art.post.title }}<span v-if="art.post.status != 'publish'" class="doc-status"><?php esc_attr_e('Pending', 'muiteer'); ?></span></a>
                                        <span v-else>{{ art.post.title }}</span>
                                        <span class="actions muiteerdocs-row-actions">
                                            <a target="_blank" :href="viewurl + article.post.id" title="<?php esc_attr_e('Preview the article', 'muiteer'); ?>"><span class="dashicons dashicons-visibility"></span></a>
                                            <span class="muiteerdocs-btn-remove" v-if="art.post.caps.delete" v-on:click="removeArticle(index, article.child)" title="<?php esc_attr_e('Delete this article', 'muiteer'); ?>"><span class="dashicons dashicons-trash"></span></span>
                                        </span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="add-section">
                <a class="button button-primary" href="#" v-on:click.prevent="addSection(doc)"><?php _e('Add Section', 'muiteer'); ?></a>
            </div>
        </li>
    </ul>
    <div class="no-docs not-loaded" v-show="!docs.length">
        <?php
            echo '
                <h2 class="tips">' . __('Ready to start editing something awesome?', 'muiteer') . '</h2>
                <a href="#" v-on:click.prevent="addDoc" class="button-primary button">' . __('Create Documentation', 'muiteer') . '</a>
            ';
        ?>
    </div>
</div>
