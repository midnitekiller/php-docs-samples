<?php
/**
 * Copyright 2018 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * For instructions on how to run the full sample:
 *
 * @see https://github.com/GoogleCloudPlatform/php-docs-samples/tree/master/firestore/README.md
 */

namespace Google\Cloud\Samples\Firestore;

use Google\Cloud\Firestore\FirestoreClient;

/**
 * Get a single document.
 * ```
 * get_document('your-project-id');
 * ```
 */
function get_document($projectId)
{
    // Create the Cloud Firestore client
    $db = new FirestoreClient([
        'projectId' => $projectId,
    ]);
    # [START fs_get_document]
    $docRef = $db->collection('cities')->document('SF');
    $snapshot = $docRef->snapshot();

    if ($snapshot->exists()) {
        printf('Document data:' . PHP_EOL);
        print_r($snapshot->fields());
    } else {
        printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
    }
    # [END fs_get_document]
}
