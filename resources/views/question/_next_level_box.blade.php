<div class="info-box bg-yellow">
    <span class="info-box-icon"><i class="fa fa-level-up"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Próximo Nível</span>
        <span class="info-box-number">{{ $next_level_name }}</span>

        <div class="progress">
            <div class="progress-bar" style="width: {{ $percentage_to_next_level }}%"></div>
        </div>
        <span class="progress-description">Você precisa de mais {{ $points_to_next_level }} pontos de XP.</span>
    </div>
</div>
