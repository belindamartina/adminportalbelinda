 <div class="row text-center">
     <div class="col">
         <table class="table table-bordered mytable">
             <thead class="table-dark">
                 <tr>
                     <th>#</th>
                     <th>Photo</th>
                     <th>Name</th>
                     <th>SN</th>
                     <th>Details</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                 <?php foreach ($students as $s) : ?>
                     <tr>
                         <td><?= $i++; ?></td>
                         <td><img src="<?= base_url('img/' . $s['Photo']); ?>" alt="" class="cover"></td>
                         <td><?= $s['name']; ?></td>
                         <td><?= $s['sn']; ?></td>
                         <td><a href="/students/<?= $s['id'] ?>" class="btn btn-success">Detail</a></td>
                     </tr>
                 <?php endforeach; ?>
             </tbody>
         </table>
         <?= $pager->links('students', 'students_pagination'); ?>
     </div>
 </div>