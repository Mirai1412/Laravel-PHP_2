<template>
    <div>
            <label class="block text-left" style="max-width: 400px">
        <button @click="getComments">댓글 불러오기</button>

            <span class="text-gray-700">댓글 작성</span>
            <textarea
                class="form-textarea mt-1 block w-full"
                rows="3"
                placeholder="Enter some long form content."></textarea>
        </label>

        <button @click="getComments"
            class="btn btn-default">댓글 불러오기</button>

        <comment-item v-for="(comment, index) in comments.data"
            :key="index" :comment="comment" />

            <pagination @pageClicked="getPage"
             v-if="comments.data != null" :links="comments.links"/>
    </div>
</template>
<script>
import Button from '../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button.vue';
import CommentItem from "./CommentItem.vue";
import Pagination from './pagination.vue';
    export default {
        props:['post','loginuser'],
        components:{CommentItem, Pagination, Button},
        data(){
            return {
                comments:[],
            }
        },

        methods:{
            addComment(){
                if(this.newComment == ''){
                    alert('asgasfd');
                    return;
                }
                axios.post('/comments/'+this.post.id, {'comment':this.newComment})
                .any()
                .catch()
            },
            getComments(){
                // this.comments=[
                //     '1st comment', '2nd comment',
                //     '3rd comment', '4th comment', '5th comment']
                    // 서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
                    // 즉, axios를 이용해서 요청
                    // 서버가 댓글 리스트를 주면 그놈을 어디에 할당?
                    // this.comment에 할당
                axios.get('/comments/'+this.post.id)
                .then(response=>{
                    // console.log(response);
                    this.comments = response.data;
                }).catch(error=>{
                    console.log(error);
                });
            },
            getPage(url){

            }
        }

    }
</script>
