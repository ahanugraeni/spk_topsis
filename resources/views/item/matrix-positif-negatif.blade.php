<div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            Matriks Solusi Ideal Posisif dan Matriks Solusi Ideal Negatif
        </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <article class="card">
                <div class="card-inner card-inner-xl">
                    <div class="card card-preview">
                        <table class="table table-tranx">
                            <h4>Positif</h4>
                            <thead>
                                <tr class="tb-tnx-head">
                                    @foreach ($criterias as $item)
                                    <th>C{{ $loop->iteration }}</th>
                                    @endforeach
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach ($positiveIdealSolution as $key => $item)
                                    <td>{{ $item }}</td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-inner card-inner-xl">
                    <div class="card card-preview">
                        <table class="table table-tranx">
                            <h4>Negatif</h4>
                            <thead>
                                <tr class="tb-tnx-head">
                                    @foreach ($criterias as $item)
                                    <th>C{{ $loop->iteration }}</th>
                                    @endforeach
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach ($negativeIdealSolution as $key => $item)
                                    <td>{{ $item }}</td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
