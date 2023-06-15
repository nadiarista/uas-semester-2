<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?= $data['title']; ?></h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/jurnal/updateJurnal" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['jurnal']['id']; ?>">

                <div class="card-body">

                    <div class="form-group">

                        <label >Nama Jurnal</label>

                        <input type="text" class="form-control" placeholder="masukkan jurnal..." name="nama_jurnal" value="<?= $data['jurnal']['nama_jurnal'];?>">

                    </div>

                    <div class="form-group">

                        <label >Nama Penerbit</label>

                        <input type="text" class="form-control" placeholder="masukkan penerbit..." name="nama_penerbit" value="<?= $data['jurnal']['nama_penerbit'];?>">

                    </div>

                    <div class="form-group">

                        <label >Ilmiah</label>

                        <select class="form-control" name="ilmu_nama">

                            <option value="">Pilih Ilmiah</option> 

                            <?php foreach ($data['ilmu'] as $row) :?>

                                <option value="<?= $row['nama_ilmu']; ?>" <?php if($data['jurnal']['ilmu_nama'] == $row['nama_ilmu']) { echo "selected"; } ?>><?= $row['nama_ilmu']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div> 

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>