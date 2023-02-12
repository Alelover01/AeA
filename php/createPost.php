<header>
    <h1>Crea un nuovo post</h1>
</header>
<form id="comment-fields" class="forms" method="POST" action="#">
    <label>
        <b>Inserisci un commento:</b>
        <textarea type="text" id="comment" name="comment"></textarea>
    </label>
</form>
<form id="images-fields" class="forms" method="POST" action="#">
    <label>
        <b>Inserisci delle immagini (massimo 6):</b>
        <input type="file" name="image-selector" id="image-selector"  accept="image/*" multiple style="display:none;"/>
        <button id="btn-img-selector">Scegli delle foto</button>
    </label>
    <div id="img-section"></div>
</form>
<form id="training-plan-fields" class="forms" method="POST" action="#">
    <label>
        <b>Inserisci un allenamento:</b>
        <div id="plan"></div>
    </label>
    <div id="selection-zone">
        <label>
            Esercizio:
            <input type="text" name="txtExcercise" id="txtExcercise" placeholder="Inserisci il nome dell'esercizio" required/>
        </label>
        <input type="button" name="btnStatico" id="btnStatico" value="Statico" required/>
        <input type="button" name="btnDinamico" id="btnDinamico" value="Dinamico"/>
        <div id="static-inputs">
            <label>
                N° ripetizioni:
                <input type="number" min="0" value="10" class="excercise" id="nbrReps" name="nbrReps"/>
            </label>
            <label>
                N° serie:
                <input type="number" min="0" value="4" class="excercise" id="nbrSerie" name="nbrSerie"/>
            </label>
            <label>
                Tempo riposo:
                <input type="number" min="0" value="1" step="0.1" class="excercise" id="nbrRestingTime" name="nbrRestingTime"/>
                <span>min</span>
            </label>
        </div>
        <div id="dynamic-inputs">
            <label>
                Durata:
                <input type="number" min="0" value="15" class="excercise" id="nbrTime" name="nbrTime"/>
                <span>min</span>
            </label>
        </div>
        <div id="submitContainer">
            <input type="submit" id="btnAggiungi" name="btnAggiungi" value="Aggiungi">
        </div>
    </div>
</form>
<form id="weight-fields" class="forms" method="POST" action="#">
    <label>
        <b>Inserisci il tuo peso attuale:</b>
        <input type="number" min="0" max="350" step="0.1" id="nbrPeso" name="nbrPeso"/>
        <span>kg</span>
    </label>
</form>
<form id="publishBtnContainer" action="#" method="POST">
    <input type="submit" name="btnPublish" value="Pubblica!"/>
</form>
<a href="profile-redirector.php">Cancella</a>