<?php
// screens/detail.php
?>
            <!-- Tela de Detalhe -->
            <div class="fade-in">
                <div class="detail-header">
                    <button class="back-button" onclick="window.location.href='?screen=main'">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </button>
                    <h1 class="detail-title"><?php echo htmlspecialchars($_GET['specialty'] ?? 'Especialidade'); ?></h1>
                    <p class="detail-subtitle">Escolha a melhor opção para você</p>
                </div>
                
                <div class="content">
                    <!-- Opção SUS -->
                    <div class="option-card slide-up">
                        <div class="option-header sus">
                            <div class="option-top">
                                <h3 class="option-title">Atendimento SUS</h3>
                                <span class="badge free">GRATUITO</span>
                            </div>
                            
                            <div class="option-info">
                                <i class="fas fa-calendar-alt"></i> Próxima vaga disponível
                            </div>
                            
                            <div class="option-date">15 de Março, 2026</div>
                            <div class="option-wait">⏱️ Tempo de espera: ~<?php echo htmlspecialchars($_GET['wait'] ?? '45 dias'); ?></div>
                            
                            <button class="btn-option btn-sus" onclick="alert('Agendamento SUS confirmado!')">
                                Agendar no SUS
                            </button>
                        </div>
                    </div>
                    
                    <!-- Alerta de Conversão -->
                    <div class="conversion-alert slide-up" style="animation-delay: 0.1s">
                        <div class="conversion-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <div class="conversion-title">Não pode esperar <?php echo htmlspecialchars($_GET['wait'] ?? '45 dias'); ?>?</div>
                            <div class="conversion-desc">Veja opções de atendimento rápido abaixo</div>
                        </div>
                    </div>
                    
                    <!-- Opções Particulares -->
                    <div class="private-options">
                        <h3 class="section-title">Atendimento Particular</h3>
                        
                        <!-- Teleconsulta -->
                        <div class="private-card featured slide-up" style="animation-delay: 0.2s">
                            <div class="private-top">
                                <div class="private-info-box">
                                    <div class="private-icon-box">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <div>
                                        <div class="private-title">Teleconsulta</div>
                                        <div class="rating">
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <span style="color: #666; margin-left: 0.25rem;">(4.9)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="private-price-box">
                                    <div class="private-price">R$ 89,90</div>
                                    <div class="private-price-desc">por consulta</div>
                                </div>
                            </div>
                            
                            <div class="private-features">
                                <div class="private-feature available">
                                    <i class="fas fa-clock"></i>
                                    <strong>Hoje ainda • 15 minutos</strong>
                                </div>
                                <div class="private-feature">
                                    <i class="fas fa-video"></i>
                                    Atendimento por vídeo
                                </div>
                            </div>
                            
                            <button class="btn-private btn-teleconsulta" onclick="alert('Preparando teleconsulta...')">
                                Agendar Agora
                            </button>
                        </div>
                        
                        <!-- Consulta Presencial -->
                        <div class="private-card slide-up" style="animation-delay: 0.3s">
                            <div class="private-top">
                                <div class="private-info-box">
                                    <div class="private-icon-box">
                                        <i class="fas fa-hospital"></i>
                                    </div>
                                    <div>
                                        <div class="private-title">Consulta Presencial</div>
                                        <div class="private-clinic">Clínica Popular Criciúma</div>
                                    </div>
                                </div>
                                <div class="private-price-box">
                                    <div class="private-price">R$ 110,00</div>
                                    <div class="private-price-desc">por consulta</div>
                                </div>
                            </div>
                            
                            <div class="private-features">
                                <div class="private-feature available">
                                    <i class="fas fa-clock"></i>
                                    <strong>Amanhã • 14:00</strong>
                                </div>
                                <div class="private-feature">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Centro de Criciúma
                                </div>
                            </div>
                            
                            <button class="btn-private btn-presencial" onclick="alert('Vendo horários disponíveis...')">
                                Ver Horários
                            </button>
                        </div>
                    </div>
                </div>
            </div>
