<template>
    <div class="container">
        <question :question="question"></question>
        <!-- {{-- <answers :answers="{{ $question->answers }}" :count="{{ $question->answers_count }}"></answers> --}} -->
        <answers :question="question"></answers>
        <!-- {{-- @include ('answers._create') --}} -->
    </div>
</template>

<script>
import Question from '../components/Question.vue';
import Answers from '../components/Answers.vue';
export default {
    props: ['question'],
    components: {Question, Answers}
}
</script>