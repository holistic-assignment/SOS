<div class="container-fluid">
    <div class="well">
    <h2>Striped Rows</h2>
    <p>The .table-striped class adds zebra-stripes to a table:</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <?php foreach($select_field as $key=>$value){?>
            <th><?php echo $key ?></th>

            <?php } ?>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($data){ ?>
        <?php foreach($data as $row){?>
          <tr>
              <?php foreach ($row as $value) { ?>
                <td><?php echo $value ?></td>
              <?php } ?>
              <td>
              <button type="button" class="btn btn-primary">Edit</button>
              </td>
              <td>
                  <button type="button" class="btn btn-danger">Delete</button>
              </td>
          </tr>
          <?php }}?>
        </tbody>
    </table>
    </div>
</div>