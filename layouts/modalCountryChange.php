    <!-- Modal -->
    <div class="modal fade" id="countryChange" tabindex="-1" aria-labelledby="countryChange" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="changeCountry.php" method="get">
                    <select class="custom-select" size="5" name="countryID">
                        <?php
                            foreach($listCountries as $country){
                        ?>
                            <option value="<?=$country->id ?>"><?=$country->name ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Seleccionar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>