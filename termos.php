<?php
    session_start();
    $sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result2=mysqli_query($con,$sql2);
    $array=mysqli_fetch_assoc($result2);
    require('man_val.php');
    require('header.php');
?>

    
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Sweeping</h2>
                    <p>Termos e condições</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li class="active">Termos e condições</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->
    
    <!-- ==========================
    	ESHOP - START 
    =========================== -->
    <section class="content eshop">
        <div class="container">
        	<div class="default-style faq">
                                
                <div class="tabs vertical-tabs">
                	<div class="row">
                    	<div class="col-sm-3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#faq-1" role="tab" data-toggle="tab" aria-controls="faq-1" aria-expanded="false">Termos e condições</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active in" id="faq-1">
									
                                    <div class="panel-group" id="faq-1-accordion" role="tablist" aria-multiselectable="true">
                                    	
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-1" aria-expanded="true" aria-controls="faq-1-q-1"> 1. Politica de Privacidade</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-1" class="panel-collapse collapse in" role="tabpanel">
                                          		<div class="panel-body">
                                                    Os serviços colocados à disposição neste web site são proporcionados pelo Sweeping. Os responsáveis do web site aluno13107.damiaodegoes.pt repsentada legalmente pela entidade Sweeping, assumem com cada utilizador registado e validado um compromisso de privacidade em relação aos dados nele alojados. Para o Sweeping, a segurança e privacidade dos dados dos utilizadores são uma questão de honra.
                                                </div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-2" aria-expanded="false" aria-controls="faq-1-q-2">2. Confidencialidade</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-2" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
                                                    Pela própria natureza e objetivos dos serviços interativos disponibilizados, é requerido aos utilizadores o fornecimento de contactos e/ou informações que podem ser consideradas de caráter pessoal. O Sweeping garante, no entanto, a todos os seus utilizadores que:
                                                    <p></p>
                                                    - Nenhum dado pessoal será facultado a terceiros sem o prévio consentimento do seu titular;
                                                    <p></p>
                                                    - Nenhum dos dados pessoais que nos seja confiado será facultado, por via gratuita ou comercial, a empresas de "marketing" direto ou outras entidades que utilizem listas de "mailing" para publicitação dos seus produtos e/ou serviços;
                                                    <p></p>
                                                    - Nenhuma informação fornecida pelo utilizador, será alguma vez partilhada ou cedida permissão para consulta por terceiros pelo Sweeping sem que para tal, após justificação, seja dado o seu consentimento;
                                                    <p></p>
                                                    Os responsáveis pelo site do Sweeping declaram respeitar o previsto na Lei de Proteção de Dados Pessoais - Lei n.º 67/98, de 26 de Outubro.
                                                    <p></p>

                                                </div>
                                        	</div>
                                        </div>
                                        <!-- QUESTION - END -->
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-3" aria-expanded="false" aria-controls="faq-1-q-3">3. Cookies</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-3" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
                                                    Visando proporcionar aos nossos utilizadores uma maior rapidez e personalização do serviço prestado, o Sweeping poderá recorrer a uma funcionalidade do "browser" conhecida como "cookie". Um "cookie" é um pequeno ficheiro de texto, automaticamente guardado pelo computador do utilizador, e que permite a sua identificação sempre que este volte a consultar, neste caso, o web site do Sweeping.
                                                    <p></p>
                                                    Qualquer utilizador pode, no entanto, configurar o seu "browser" por forma a impedir a instalação de "cookies" no seu computador. Contudo, essa opção poderá tornar a sua navegação mais lenta, tanto neste como outros web sites da Internet.
                                                </div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-4" aria-expanded="false" aria-controls="faq-1-q-4">4. Ligações a Terceiros</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-4" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
                                                    Este web site, construído numa lógica de Portal Dinâmico no domínio de serviços de apoio aos membros da comunidade educativa ligados a este agrupamento, poderá conter ligações para outros web sites na Internet, nacionais ou estrangeiros.
                                                    <p></p> 
                                                    Ao estabelecer, a partir deste web site, ligações a outros web sites na Internet, através de "links, o Sweeping, não assume qualquer responsabilidade, pela política de segurança e privacidade, forma, conteúdo ou práticas desses mesmos web sites.
                                                </div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-5" aria-expanded="false" aria-controls="faq-1-q-5">5. Correção e Atualização de Informação de Caráter Pessoal</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-5" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
                                                    Cada utilizador dos serviços interativos disponibilizados é responsável e titular dos dados que transmita ao Sweeping, podendo controlar a quantidade de informação fornecida e quando (e em que circunstâncias) esta poderá, ou deverá, ser facultada a terceiros.
                                                    <p></p>
                                                    Caso o Utilizador entenda alterar qualquer informação de carácter pessoal e/ou respetivas condições de divulgação, poderá sempre fazê-lo. Basta para tal aceder à sua conta, mediante a utilização do seu "login" e "password".
                                                </div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-6" aria-expanded="false" aria-controls="faq-1-q-6">6. Termos de Uso</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-6" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
                                                    6.1 Este Web Site contém informações específicas e documentação relacionada, para visualização, uso ou para download. O utilizador está autorizado a descarregar, exibir ou imprimir informações contidas neste Web Site exclusivamente para uso próprio e sem quaisquer finalidades comerciais.
                                                    <p></p><p></p>
                                                    6.2 Este portal é uma aplicação web e engloba várias páginas, incluídas e pertencentes ao domínio aluno13107.damiaodegoes.pt , algumas de acesso público, e outras de acesso condicionado.
                                                    <p></p><p></p>
                                                    6.3 Os utilizadores deste Web Site são entendidos como pessoas com personalidade jurídica.
                                                    <p></p><p></p>
                                                    6.4 O Sweeping reserva o direito de interromper ou desativar quaisquer atividades do Web Site. Os responsáveis do Sweeping, que gerem a informação contida neste Web Site, não responderão sob hipótese alguma por qualquer interrupção ou desativação de uma ou mais atividades deste Web Site, que seja decorrente de ações ou omissões do Sweeping ou de terceiros. A qualquer altura o Sweeping poderá suspender a operação do Web Site, por completo ou em parte. Devido à natureza dos sistemas da Internet e de computadores, o Sweeping não pode aceitar qualquer responsabilidade pela contínua disponibilidade do seu Web Site.
                                                    <p></p><p></p>
                                                    6.5 Algumas páginas do Web Site do Sweeping podem estar protegidas por senha. Em benefício da segurança, proteção de dados e das informações e transações, apenas os utilizadores registados podem aceder a essas ditas páginas. O Sweeping reserva o direito de, a qualquer momento e sem a obrigação de explicar os motivos, negar a qualquer utilizador o direito de aceder à área protegida por senha por bloqueio dos seus dados de acesso, em particular se o utilizador:
                                                    <p></p><p></p>
                                                    - Usar dados falsos para fins de registo
                                                    <p></p>
                                                    - Violar algum dos Termos de Uso ou negligenciar as suas obrigações de tomar cuidado em relação aos Dados de Utilizador
                                                    <p></p>
                                                    - Violar quaisquer leis aplicáveis no acesso ou no uso do Web Site do Sweeping
                                                    <p></p>
                                                    - Se não fizer uso do Web Site do Sweeping por um período de mais de 12 meses
                                                    <p></p>
                                                    - Se for detetada a divulgação dos seus dados de acesso para uso de terceiros
                                                    <p></p><p></p>
                                                    6.6 Para o registo, o utilizador fornecerá informações precisas e atualizadas. Sempre que, por qualquer motivo as informações fornecidas no registo, sofrerem alteração, estas deverão ser atualizadas (na medida do possível via on-line). O utilizador deverá assegurar, que o endereço de correio eletrónico utlizado no registo, é um endereço ativo e no qual o utilizador pode sempre ser contactado.
                                                    <p></p><p></p>
                                                    6.7 O Utilizador deve assegurar que os seus dados de acesso não são acessíveis por terceiros e será responsável por todas as transações e outras atividades realizadas a partir do acesso com os seus dados de acesso. No término de cada sessão on-line, por razões de segurança, o utilizador deve terminar a sua sessão através do botão Logout ou Sair, próprios para essa operação. Sempre e na medida em que o utilizador for informado ou se aperceber que os seus dados de acesso foram comprometidos e que terceiros possam estar eventualmente a fazer uso indevido dos seus dados de acesso, o utilizador obriga-se a notificar de imediato por escrito ao Sweeping (poderá ser via e-mail) e a alterar a sua senha através do próprio Web Site no local adequado para o efeito.
                                                    <p></p><p></p>
                                                    6.8 O utilizador deverá manter e reproduzir todo e qualquer aviso de copyrights e demais avisos de direitos de exclusividade e de autor constantes nos ficheiros por ele descarregados. Entretanto, é vedado ao utilizador distribuir, modificar, transmitir, re-utilizar, re-incluir ou utilizar o conteúdo do Site para fins públicos ou comerciais, incluindo o texto, imagens, áudio e vídeo sem a autorização expressa dos responsáveis do Sweeping. O utilizador deverá tratar todo o conteúdo deste Site de acordo com sua condição de protegido pela lei de direitos autorais de copyright, observadas quaisquer disposições em contrário e não poderá ser utilizado salvo conforme disposições destes Termos e Condições ou no texto do Site sem a autorização expressa do Sweeping.
                                                    <p></p><p></p>
                                                    6.9 Os Web Sites (incluindo todas as páginas) do Sweeping na Internet podem conter ou citar marcas registadas, patentes, informações, tecnologias, produtos, processos ou outros direitos protegidos por patentes de propriedade do Sweeping ou sob uso deste. Sob hipótese alguma a utilização deste Web Site implica a cessão ao utilizador das citadas marcas registadas, patentes, informações, tecnologias, produtos, processos ou outros direitos protegidos por patentes de propriedade da Sweeping ou por ele utilizados e/ou contratados.
                                                    <p></p><p></p>
                                                    6.10 O Sweeping concede ao utilizador uma licença não-exclusiva, não-transmissível e individual de acesso aos serviços disponibilizados que não pode ser em caso algum sub-licenciada ou divulgada para uso de terceiros.
                                                    <p></p><p></p>
                                                    6.11 Por questões de segurança interna no que concerne ao controlo do fluxo de informação e no interesse da totalidade de utilizadores do Sweeping, as informações e documentação contidas no Web Site, não poderão ser em momento algum distribuídas pelo utilizador a terceiros, nem poderão ser alugadas ou, de outra maneira, disponibilizadas. Tal facto só poderá verificar-se se for descrito e justificado qual a informação a ser divulgada, qual a razão e qual o destinatário sendo para isso expressamente necessária a autorização por escrito (pode ser por e-mail) por parte do Sweeping. Por conseguinte nenhum utilizador poderá modificar, alterar ou converter a documentação descrita a ser passada a terceiras pessoas nem poderá ser de nenhuma forma desagregada.
                                                    <p></p><p></p>
                                                    6.12 Embora o Sweeping utilize todos os recursos ao seu alcance para exibir informações exatas e atualizadas no seu Web Site, o mesmo abstém-se de dar garantias ou declarações relativamente ao conteúdo deste Web Site, que deve ser entendido "no estado em que se encontram". O Sweeping, não aceita quaisquer responsabilidades decorrentes ou relativas à utilização deste Web Site e de seu conteúdo. Em especial, o Sweeping é responsável pela precisão, integridade, segurança, pertinência, oportunidade ou abrangência das informações contidas neste Web Site. O Sweeping não responderá por danos ou vírus que possam vir a infetar o computador ou equipamento ou outros bens decorrentes do acesso do utilizador ao Web Site ou da navegação pelo mesmo ou por descarregar quaisquer materiais, dados, textos, imagens, vídeos ou áudios incluídos no Site.
                                                    <p></p><p></p>
                                                    6.13 Qualquer comunicação ou material transmitido pelo utilizador ao Site via e-mail ou outra forma de transmissão, incluindo dados, perguntas, comentários, sugestões e similares serão tratados como não sigilosa e não protegida. Qualquer material transmitido ou incluído pelo utilizador torna-se automaticamente propriedade do Sweeping e poderá ser usado para fins do próprio Web Site, incluindo, entre outros, reprodução, divulgação, transmissão, publicação, transmissão ou inclusão após convenção com o utilizador que lhe deu origem.
                                                    <p></p><p></p>
                                                    6.14 O Sweeping terá a liberdade de usar ideias, conceitos, know-how ou técnicas contidas em qualquer comunicação transmitida pelo utilizador ao Sweeping para quaisquer fins, incluindo, entre outros, desenvolvimento, fabricação e comercialização de produtos utilizando as referidas informações.
                                                    <p></p><p></p>
                                                    6.15 As informações poderão conter inexatidões técnicas ou erros de digitação. O Sweeping reserva o direito de fazer alterações, correções e melhorias nas Informações e nos produtos e programas descritos nas referidas informações a qualquer momento e sem prévio aviso.
                                                    <p></p><p></p>
                                                    6.16 O Sweeping reserva-se o direito de fazer correções ao software de suporte ao Web Site, quer pela ocorrência ou deteção de erros técnicos quer por motivo de melhoria dos processo em execução sem que para tal tenha avisar o utilizador, desde que estas alterações não afetem o acesso e uso do Web Site por parte do utilizador.
                                                    <p></p><p></p>
                                                    6.17 O Sweeping, caso, por motivos de intervenção técnica, tenha necessidade bloquear o Web Site por mais de 5 (cinco) horas, obriga-se a informar o utilizador com uma antecedência mínima de 48 horas. Uma vez que todo o serviço assenta no meio de comunicação via internet, excetuam-se as indisponibilidades do Web Site por motivos de deficiência técnica imputáveis ao ISP (Internet Service Provider) contratado (alheios ao Sweeping), tanto do servidor onde se encontram alojados todos os serviços do Sweeping como do acesso à internet do utilizador.
                                                    <p></p><p></p>
                                                    6.18 As páginas do Web Site do Sweeping na Internet contêm informações sobre os seus serviços em âmbito mundial, sendo que apenas se encontra disponível para uso e interação utilizadores pertencentes ao território nacional Português.
                                                    <p></p><p></p>
                                                    6.19 Considere-se que o Sweeping poderá conter links (ligações via Web) para outros Web Sites não pertencentes à propriedade do mesmo, logo não tem controlo ou incorpora qualquer desses Web Sites. O utilizador deverá estar ciente de que o Sweeping não se responsabiliza pelo conteúdo de páginas fora de seu Web Site ou outros Web Sites com link para o seu Web Site. Ao utilizar um link para o seu Web Site, páginas fora do seu Web Site ou outros Web Sites, o utilizador está agindo por sua própria conta e risco e sem a permissão do Sweeping. Ao utilizar, os referidos links, o utilizador fica ciente de que se aplicam a nota legal e a política de privacidade do Web Site remetido pelo link, as quais poderão divergir das políticas do Sweeping. O Sweeping recomenda vivamente, que por razões de segurança, apenas se deve aceder ao seu Web Site via endereço Web digitado no próprio Browser de Internet e em momento algum se deve fazer o acesso a partir de links em outros Web Sites e/ou conteúdos enviados por correio eletrónico.
                                                    <p></p><p></p>
                                                    6.20 O Sweeping poderá a qualquer momento alterar estes Termos de Uso, atualizando o seu conteúdo.
                                                    <p></p><p></p>
                                                    6.21 Os links ao Web Site do Sweeping são restritos à sua Home Page, que é o seu único ponto de acesso. Os links directos a páginas subsequentes são estritamente proibidos.
                                                    <p></p>
                                                </div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                    </div>
                                        

                                        
                                                                              
                                    </div>
                                    
                                </div>
                               
                                    
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                
        	</div>
        </div>
    </section>
    <!-- ==========================
    	ESHOP - END 
    =========================== -->
    
    </div> <!-- PAGE - END -->
    
   	<!-- ==========================
    	JS 
    =========================== -->        
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.dragtable.js"></script>
    <script src="assets/js/jquery.card.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/twitterFetcher_min.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="assets/js/color-switcher.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>