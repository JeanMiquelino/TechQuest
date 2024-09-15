<div class="info-box bg-green">
    <span class="info-box-icon"><i class="fa fa-question"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Perguntas</span>
        <span class="info-box-number">{{ $answered_questions }}</span>

        <div class="progress">
            <div class="progress-bar" style="width: {{ $percentage_of_answered_questions }}%"></div>
        </div>
        <span
            class="progress-description">Você respondeu {{ $percentage_of_answered_questions }}% das perguntas.</span>
    </div>
</div>
